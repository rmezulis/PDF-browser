<?php

namespace App\Http\Controllers;

use App\Pdf;

class ShowAllPdfController extends Controller
{
    public function __invoke()
    {
        return view('pdf_browser', [
            'pdfs' => Pdf::all()
        ]);
    }
}
