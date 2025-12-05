<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarriageContract;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF; // barryvdh/laravel-dompdf


class MarriageContractController extends Controller
{
    private function saveBase64Image($base64String, $prefix)
    {
        if (!$base64String) return null;

        $image = str_replace('data:image/png;base64,', '', $base64String);
        $image = str_replace(' ', '+', $image);
        $imageName = "{$prefix}_" . time() . ".png";

        Storage::disk('public')->put("uploads/{$imageName}", base64_decode($image));

        return $imageName;
    }

   

    public function createorginal(Request $request)
    {
        try {
            $validated = $request->validate([
                'partyA' => 'required|string',
                'partyB' => 'required|string',
                'mahr' => 'nullable|string',
                'duration' => 'nullable|string',
                'startDate' => 'nullable|date',
                'location' => 'nullable|string',
                'conditions' => 'nullable|string',
                'witness1Name' => 'nullable|string',
                'witness1Address' => 'nullable|string',
                'witness2Name' => 'nullable|string',
                'witness2Address' => 'nullable|string',
                'consent' => 'nullable|boolean',
                'signatures' => 'nullable|array',
            ]);

            // ============================
            // Save Base64 Signatures
            // ============================
            $signatures = $validated['signatures'] ?? [];

            $signature_husband  = $this->saveBase64Image($signatures['partyA'] ?? null, 'husband');
            $signature_wife     = $this->saveBase64Image($signatures['partyB'] ?? null, 'wife');
            $signature_witness1 = $this->saveBase64Image($signatures['witness1'] ?? null, 'witness1');
            $signature_witness2 = $this->saveBase64Image($signatures['witness2'] ?? null, 'witness2');

            // ============================
            // Store Contract in DB
            // ============================
            $contract = MarriageContract::create([
                'husbandName' => $validated['partyA'],
                'wifeName' => $validated['partyB'],
                'mahr' => $validated['mahr'] ?? null,
                'duration' => $validated['duration'] ?? null,
                'startDate' => $validated['startDate'] ?? null,
                'location' => $validated['location'] ?? null,
                'conditions' => $validated['conditions'] ?? null,
                'witness1Name' => $validated['witness1Name'] ?? null,
                'witness1Address' => $validated['witness1Address'] ?? null,
                'witness2Name' => $validated['witness2Name'] ?? null,
                'witness2Address' => $validated['witness2Address'] ?? null,
                'consent' => $validated['consent'] ?? false,
                'signature_husband' => $signature_husband,
                'signature_wife' => $signature_wife,
                'signature_witness1' => $signature_witness1,
                'signature_witness2' => $signature_witness2,
            ]);

            // ============================
            // Generate PDF using mPDF
            // ============================
            $pdf = PDF::loadView('pdf.marriage_certificate', ['contract' => $contract], [], [
                'format'      => 'A4',
                'orientation' => 'L',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'title' => 'Marriage Certificate',
            ]);

            // Optional Header/Footer
            $mpdf = $pdf->getMpdf();
            // $mpdf->SetHTMLHeader('<div style="text-align:center; font-size:12px;">Marriage Certificate</div>');
            // $mpdf->SetHTMLFooter('<div style="text-align:center;">Page {PAGENO}</div>');

            // Save PDF in Storage
            $pdfName = "certificate_{$contract->id}_" . time() . ".pdf";
            $pdfPath = "certificates/{$pdfName}";

            Storage::disk('public')->put($pdfPath, $pdf->output());

            // Update DB with PDF name
            $contract->update(['certificate' => $pdfName]);

            // ============================
            // Send Email With PDF Attached
            // ============================
            // Mail::send('emails.marriage_congratulations', ['contract' => $contract], function ($message) use ($contract, $pdfPath) {
            //     $message->to('recipient@example.com')
            //         ->subject("💍 Congratulations {$contract->husbandName} & {$contract->wifeName}")
            //         ->attach(storage_path("app/public/{$pdfPath}"));
            // });

            return response()->json([
                'status' => true,
                'message' => 'Marriage contract created successfully.',
                'data' => $contract,
                'certificate' => asset("storage/{$pdfPath}")
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'maleName' => 'required|string',
                'femaleName' => 'required|string',
                'mehr' => 'nullable|string',
                'agreedPeriodMarriage' => 'nullable|string',
                'marriageDate' => 'nullable|date',
                'location' => 'nullable|string',
                'conditions' => 'nullable|string',
                'witness1Name' => 'nullable|string',
                'witness2Name' => 'nullable|string',
                'signatures' => 'nullable|array',
            ]);

            // ============================
            // Save Base64 Signatures
            // ============================
            $signatures = $validated['signatures'] ?? [];

            $signature_husband  = $this->saveBase64Image($signatures['maleSignature'] ?? null, 'male');
            $signature_wife     = $this->saveBase64Image($signatures['femaleSignature'] ?? null, 'female');
            
            // ============================
            // Store Contract in DB
            // ============================
            $contract = MarriageContract::create([
                'husbandName' => $validated['maleName'],
                'wifeName' => $validated['femaleName'],
                'mahr' => $validated['mehr'] ?? null,
                'duration' => $validated['agreedPeriodMarriage'] ?? null,
                'startDate' => $validated['marriageDate'] ?? null,
                'location' => $validated['location'] ?? null,
                'conditions' => $validated['conditions'] ?? null,
                'witness1Name' => $validated['witness1Name'] ?? null,
                'witness1Address' => null,
                'witness2Name' => $validated['witness2Name'] ?? null,
                'witness2Address' =>  null,
                'consent' => false,
                'signature_husband' => $signature_husband,
                'signature_wife' => $signature_wife,
                'signature_witness1' => null,
                'signature_witness2' => null,
            ]);

            // ============================
            // Generate PDF using mPDF
            // ============================
            $pdf = PDF::loadView('pdf.marriage_certificate', ['contract' => $contract], [], [
                // 'format'      => 'A4',
                // 'orientation' => 'L',
                // 'margin_left' => 10,
                // 'margin_right' => 10,
                // 'margin_top' => 10,
                // 'margin_bottom' => 10,
                // 'title' => 'Marriage Certificate',
                //             'format' => 'A4-L',
                // 'orientation' => 'L',
                // 'margin_top' => 0,
                // 'margin_bottom' => 0,
                // 'margin_left' => 0,
                // 'margin_right' => 0,
                'format'      => [297, 210],     // A4 Landscape in mm
                'orientation' => 'L',
                'margin_left' => 0,
                'margin_right' => 0,
                'margin_top' => 0,
                'margin_bottom' => 0,
            ]);

            // Optional Header/Footer
            $mpdf = $pdf->getMpdf();
            // $mpdf->SetHTMLHeader('<div style="text-align:center; font-size:12px;">Marriage Certificate</div>');
            // $mpdf->SetHTMLFooter('<div style="text-align:center;">Page {PAGENO}</div>');

            // Save PDF in Storage
            $pdfName = "certificate_{$contract->id}_" . time() . ".pdf";
            $pdfPath = "certificates/{$pdfName}";

            Storage::disk('public')->put($pdfPath, $pdf->output());

            // Update DB with PDF name
            $contract->update(['certificate' => $pdfName]);

            // ============================
            // Send Email With PDF Attached
            // ============================
            // Mail::send('emails.marriage_congratulations', ['contract' => $contract], function ($message) use ($contract, $pdfPath) {
            //     $message->to('recipient@example.com')
            //         ->subject("💍 Congratulations {$contract->husbandName} & {$contract->wifeName}")
            //         ->attach(storage_path("app/public/{$pdfPath}"));
            // });

            return response()->json([
                'status' => true,
                'message' => 'Marriage contract created successfully.',
                'data' => $contract,
                'certificate' => asset("storage/{$pdfPath}")
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }


}
