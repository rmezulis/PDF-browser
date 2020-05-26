<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNewPdfRequest;
use App\Pdf;
use Illuminate\Support\Facades\Storage;

class StorePdfController extends Controller
{
    public function __invoke(AddNewPdfRequest $request)
    {
        $pdf = new Pdf([
            'name' => $request->file('pdf')->getClientOriginalName(),
            'file' => $request->file('pdf')->store('PDFs')
        ]);
        $pdf->save();
        $this->storeThumbnail($pdf);
        return redirect()->route('pdf.show_all');
    }

    private function storeThumbnail(Pdf $pdf)
    {
        if (!Storage::exists('thumbnails/')) {
            Storage::makeDirectory('thumbnails/');
        }
        $thumbnailPath = storage_path("app/public/thumbnails/");
        $fileName = md5($pdf->file) . '.png';
        $pdfPath = storage_path('app/public/' . $pdf->file);
        exec("gs -o " . $thumbnailPath . $fileName . " -sDEVICE=pngalpha -dLastPage=1 -r72 " . $pdfPath);
        $pdf->update([
            'thumbnail' => 'thumbnails/' . $fileName
        ]);
    }

}
