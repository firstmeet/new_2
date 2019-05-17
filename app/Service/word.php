<?php


namespace App\Service;


use App\Sign;

class word
{
    /**
     * @param $form
     * @param $to
     * html转word文档
     */
    public function htmlToWord(){

        $path=storage_path("File/to_word.html");

        $isHave=file_exists($path);

//        if(empty($isHave)){
//            $this->error("文件不存在!");
//        }

        $zhi=file_get_contents($path);
        //把左边距替换掉
        $str1 = str_replace('margin-left:100px;', '', $zhi);// es

        $sign=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        $money=$sign['number']*1400;
        $member_id=auth()->user()->id+1000000;

        $str1=str_replace('{{$money}}',$money,$str1);
        $str1=str_replace('{{$member_id}}',$member_id,$str1);

        echo $str1;

        $this->make($zhi);
    }
    private function make($html){
        $wordname=uniqid().'.docx';
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:w="urn:schemas-microsoft-com:office:word"
        xmlns="http://www.w3.org/TR/REC-html40">';

        @header('Content-type:application/word');
        header('Content-Disposition: attachment; filename='.$wordname.'');
        @readfile($wordname);
        ob_flush();//每次执行前刷新缓存
        flush();
    }
}
