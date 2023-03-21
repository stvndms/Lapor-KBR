<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $pengaduan = Pengaduan::latest()->get();

        $data = [
            'pengaduan' => $pengaduan,
        ];

        $pdf = Pdf::loadView('pdf.laporan', $data)->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');
    }
}
