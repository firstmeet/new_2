<?php


namespace App\Service;


use setasign\Fpdi\Tcpdf\Fpdi;

class pdf extends \setasign\Fpdi\Fpdi
{
    var $angle=0;

    function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }

    function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

    function RotatedText($x,$y,$txt,$angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }

    function RotatedImage($file,$x,$y,$w,$h,$angle)
    {
        //Image rotated around its upper-left corner
        $this->Rotate($angle,$x,$y);
        $this->Image($file,$x,$y,$w,$h);
        $this->Rotate(0);
    }
     function watermark($file,$newfile=null)
    {
        $pdf=new pdf();
        $image=$this->text_image((auth()->user()->id)+1000000);
        $count=$pdf->setSourceFile($file);
        for($i=1;$i<=$count;$i++){
            $templateId = $pdf->importPage($i);

            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId);

            // create a page (landscape or portrait depending on the imported page size)
            if ($size['width'] > $size['height']) $pdf->AddPage('L', array($size['width'], $size['height']));
            else $pdf->AddPage('P', array($size['width'], $size['height']));

            // use the imported page
            $pdf->useTemplate($templateId);
            $pdf->Image($image,30,40);

//
//            $pdf->SetFont('Arial','B','50');
//            // sign with current date
//            $pdf->SetXY(0, 0); // you should keep testing untill you find out correct x,y values
//            $pdf->RotatedText(100,150,(auth()->user()->id)+1000000,50);
//            $pdf->SetFillColor(30);
//            $pdf->Write(20, date('Y-m-d'));
        }
        if ($newfile){
            $pdf->Output('F',$newfile);
        }else{
             $pdf->Output();
        }

    }

     function text_image($text)
    {
        $img=\Intervention\Image\Facades\Image::canvas(500,400);
        $img->text($text,0,150,function ($font){

            $font->file(storage_path('MSYHBD.TTF'));
            $font->size(100);
            $font->color(array(144, 144, 144, 0.5));
//            $font->color('#000000');
//            $font->align('center');
//            $font->valign('top');
//            $font->angle(-45);
        });
        $img->rotate(45);
        $path=public_path('images/water/'.uniqid().'.png');
        $img->save($path);
        return $path;
    }
}
