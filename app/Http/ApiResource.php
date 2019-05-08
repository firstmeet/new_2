<?php


namespace App\Http;


trait ApiResource
{
    public function message($data,$error_status=0,$message='')
    {
        return response()->json(['data'=>$data,'error'=>$error_status,'message'=>$message]);
    }
}
