<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Pasien;

class PDFController extends Controller
{
    public function downloadPdf($id)
    {
        // Fetch pasien data based on ID
        $pasien = Pasien::with(['anamnesa', 'pemeriksaanFisik'])->findOrFail($id);

        // Prepare data for the view
        $data = [
            'title' => 'Rekam Medis Pasien',
            'pasien' => $pasien,
        ];

        // Generate PDF from a Blade view
        $pdf = PDF::loadView('rekammedis.pdf_template', $data);

        // Return the PDF response with a custom filename
        return $pdf->download('rekam_medis_' . $pasien->id . '.pdf');
    }
}
