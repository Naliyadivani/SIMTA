<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to Laravel PDF generation!'];

        $pdf = PDF::loadView('Pdf.pdfadmin', $data);

        return $pdf->download('laravel_demo.pdf');
    }
}
