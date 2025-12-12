<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarriageContract;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF; // barryvdh/laravel-dompdf
use App\Helpers\ApiResponse;

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

            $pdf = PDF::loadView('pdf.marriage_certificate', [
                'contract' => $contract
            ], [], [
                //'format' => 'letter',
                'format'        => [403, 403],  // US Letter Landscape (Width x Height in mm)
                'orientation'   => 'L',             // Landscape
                'margin_left'   => 0,
                'margin_right'  => 0,
                'margin_top'    => 0,
                'margin_bottom' => 0,
                'margin_header' => 0,
                'margin_footer' => 0,
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

            $mpdf = $pdf->getMpdf();
            $pdfName = "certificate_{$contract->id}_" . time() . ".pdf";
            $pdfPath = "certificates/{$pdfName}";
            Storage::disk('public')->put($pdfPath, $pdf->output());

            // Update DB with PDF name
            $contract->update(['certificate' => $pdfName]);

            // ============================
            // Send Email With PDF Attached
            // ============================

            try {
                // Mail::send('emails.marriage_congratulations', ['contract' => $contract], function ($message) use ($contract, $pdfPath) {
                //     $message->to('arfgjhgjhgfjun@fgjgjfgjg.com')
                //         ->subject("💍 Congratulations {$contract->husbandName} & {$contract->wifeName}")
                //         ->attach(storage_path("app/public/{$pdfPath}"));
                // });
            } catch (\Exception $e) {
                \Log::error("Email failed: " . $e->getMessage());
            }
            return  ApiResponse::success(['certificate' => asset("storage/{$pdfPath}")], "Marriage contract created successfully");
        } catch (\Exception $e) {
            \Log::error("contract creation error: " . $e->getMessage());
            return  ApiResponse::error('Server error', $e->getMessage());
        }
    }
}
