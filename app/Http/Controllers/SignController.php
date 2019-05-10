<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Service\money;
use App\Service\pdf;
use App\Service\zip;
use App\Sign;
use Faker\Provider\Image;
use HelloSign\Client;
use HelloSign\EmbeddedSignatureRequest;
use HelloSign\SignatureRequest;
use HelloSign\TemplateSignatureRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    private $client_id;
    private $client;
    private $request;
    private $embed_request;
    public function __construct()
    {
        $api_key='848248605559a4d9cace71abd751f0ccd1f3da944ac12252d9021e0396e5db9b';
        $client_id='4912850865d71257e073d540c5764a2f';
        $this->client_id=$client_id;
        $client = new Client($api_key);
        $this->client=$client;
        $request = new SignatureRequest();
        $request->enableTestMode();
        $this->request=$request;
    }

    use ApiResource;
    public function index(Request $request)
    {
        if (!is_null($request->get('status'))){
            $data=Sign::where([['user_id','=',auth()->user()->id],['status','=',$request->get('status')]])->get();
        }else{
            $data=Sign::where('user_id',auth()->user()->id)->get();
        }
        return $this->message($data);
    }

    public function create()
    {
        $email=auth()->user()->username;
        $sign_info=Sign::where('user_id',auth()->user()->id)->first();
        if (!$sign_info['number']){
            return $this->message([],1,__t("failed"));
        }
        $client = new Client('rj@shanghaisupport.com','elev0607');
        $template_id="24772c4fe45d85d1c5a58faf758dad58042d4a6e";
        $request = new TemplateSignatureRequest();
        $request->enableTestMode();
        $request->setTemplateId($template_id);
        $request->setSubject('Purchase Order');
        $request->setMessage('Glad we could come to an agreement.');
        $request->setSigner('member', $email, $sign_info['name']);
        $money=new money();
//$request->setCC('Accounting', '871609160@qq.com');
        $request->setCustomFieldValue('money', $money->umoney(1400*$sign_info['number']));
        $request->setCustomFieldValue("number",number_format($sign_info['number']*1400));
        $request->setCustomFieldValue("day",date('d',time()));
        $request->setCustomFieldValue("name",$sign_info['name']);
        $request->setCustomFieldValue("month",date('m',time()));
        $embedded_request = new EmbeddedSignatureRequest($request, $this->client_id);

        $response = $this->client->createEmbeddedSignatureRequest($embedded_request,$this->client_id);
        $signatures   = $response->getSignatures();
        $signature_id = $signatures[0]->getId();

// Retrieve the URL to sign the document
        $response_2 = $this->client->getEmbeddedSignUrl($signature_id);

// Store it to use with the embedded.js HelloSign.open() call
        $sign_url = $response_2->getSignUrl();
        Session::put('signature_id',$signature_id);
        Session::put('signature_request_id',$response->signature_request_id);
        return $sign_url;

    }
    public function store(Request $request)
    {
        if (\session('signature_id')==$request->get('signature_id')&&$request->get('event')=="signature_request_signed"){
            $data=[
                'status'=>1,
                'signature_id'=>\session('signature_request_id'),
                'signature_request_id'=>\session('signature_id')
            ];
            $sign=Sign::where('user_id',auth()->user()->id)->update($data);
            if ($sign){
                return $this->message('',0,__('15423548318740'));
            }
        }

    }
    public function download(Request $request)
    {
        $signature_request_id=$request->get('signature_request_id');
        $uploads_dir=storage_path('uploads/'.$signature_request_id.'.pdf');
        $uploads_dir_water=storage_path('uploads/'.$signature_request_id.'.wa.pdf');
        $file_arr=[storage_path('1.wa.pdf'),storage_path('2.wa.pdf'),$uploads_dir_water];
        $pdf=new pdf();
        $zip=new zip();
        $zip_dest=storage_path($signature_request_id.'.zip');
        if (file_exists($uploads_dir)&&file_exists($uploads_dir_water)){

              $zip->zipFiles($zip_dest,$file_arr);


//            $this->watermark($uploads_dir,$uploads_dir_water);
            return response()->download($zip_dest,$signature_request_id.'.zip');
        }elseif(file_exists($uploads_dir)&&!file_exists($uploads_dir_water)){
            $pdf->watermark($uploads_dir,$uploads_dir_water,1);
            $zip->zipFiles($zip_dest,$file_arr);
            return response()->download($zip_dest,$signature_request_id.'.zip');
        }else{
            $down=$this->client->getFiles($signature_request_id,$uploads_dir,'pdf');
            if ($down){
                $pdf->watermark($uploads_dir,$uploads_dir_water,1);
                $zip->zipFiles($zip_dest,$file_arr);

                return response()->download($zip_dest,$signature_request_id.'.zip');
            }else{
                return back()->with('no_files',"files not found");
            }
        }


    }
    public function update(Request $request)
    {
        if (Sign::where('user_id',auth()->user()->id)->update($request->all())){
            return $this->message([],0,__t("15423548318740"));
        }else{
            return $this->message([],1,__t("failed"));
        }
    }
    public function callback(Request $request)
    {
       $string=$request->all();
       if ($string['event_type']=='signature_request_signed') {
          Sign::where('signature_request_id',$string['signature_request']['response_data'][0]['signature_id'])->update(['is_signed'=>1]);
       }
    }


}
