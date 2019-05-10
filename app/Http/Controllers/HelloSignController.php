<?php

namespace App\Http\Controllers;

use App\Service\pdf;
use App\Service\zip;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Mpdf\Mpdf;

class HelloSignController extends Controller
{
    public function index(Request $request)
    {
       $pdf=new pdf();
       $page=$request->get('page',1);
       $pdf->show(storage_path($page.'.wa.pdf'));


    }
}
