<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class HelloSignController extends Controller
{
    public function index(Request $request)
    {
        $page=$request->get('page',1);
        $mpdf=new Mpdf();
        $mpdf->SetTitle("ceshi");

//        $mpdf->SetWatermarkImage(public_path('1.jpg')); // Will cope with UTF-8 encoded text
        $mpdf->SetWatermarkText("test");
        $mpdf->watermark_font = 'msyhd';
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha =0.5;
        $mpdf->WriteHTML(file_get_contents(storage_path($page.'.html')));
//        $mpdf->watermarkImageAlpha = 0.5;
        $mpdf->Output();
    }
}
