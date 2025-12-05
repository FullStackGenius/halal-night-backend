<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import the PDF facade from the wrapper
class PdfController extends Controller
{
//    public function generatePdf()
//     {
//         $data = [
//             'title' => 'Hello mPDF in Laravel 11',
//             'users' => ['John', 'Jane']
//         ];

//         // Load the view with custom options (overrides config/pdf.php)
//         $pdf = PDF::loadView('test-font', $data, [], [
//             'format'      => 'A4',      // Paper size
//             'orientation' => 'L',       // Landscape (or 'P' for portrait)
//             'title'       => 'My Custom PDF Title',
//             'margin_left' => 15,
//             'margin_right' => 15,
//             // Add any other mPDF config keys here
//         ]);

//         // Optional: Access underlying mPDF for advanced settings
//         $mpdf = $pdf->getMpdf();
//         $mpdf->SetHTMLHeader('<div style="text-align: right;">Custom Header</div>');
//         $mpdf->SetHTMLFooter('<div style="text-align: center;">Page {PAGENO}</div>');

//         // Output the PDF
//         //return $pdf->download('example.pdf');
//         return $pdf->stream('example.pdf');

//         // Or stream: return $pdf->stream('example.pdf');
//         // Or save: $pdf->save(storage_path('app/public/example.pdf'));
//     }
}
