<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Sign;
use HelloSign\Client;
use HelloSign\EmbeddedSignatureRequest;
use HelloSign\SignatureRequest;
use HelloSign\TemplateSignatureRequest;
use Illuminate\Http\Request;
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
        if ($request->get('status')){
            $data=Sign::where([['user_id','=',auth()->user()->id],['status','=',$request->get('status')]])->get();
        }else{
            $data=Sign::where('user_id',auth()->user()->id)->get();
        }
        return $this->message($data);
    }

    public function create()
    {
        $email=auth()->user()->user_name;
        $sign_info=Sign::where('user_id',auth()->user()->id)->first();
        if (!$sign_info['number']){
            return $this->message([],1,__t("failed"));
        }
        $client = new Client('rj@shanghaisupport.com','elev0607');
        $template_id="cb9a043974c528e676d92d37d228a9a90ede2d38";
        $request = new TemplateSignatureRequest();
        $request->enableTestMode();
        $request->setTemplateId($template_id);
        $request->setSubject('Purchase Order');
        $request->setMessage('Glad we could come to an agreement.');
        $request->setSigner('member', $email, $sign_info['name']);
//$request->setCC('Accounting', '871609160@qq.com');
        $request->setCustomFieldValue('money', number_format(1400*$sign_info['number']));
        $request->setCustomFieldValue("number",$sign_info['number']);
        $request->setCustomFieldValue("day",date('d',time()));
        $request->setCustomFieldValue("name","wuyuansong");
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
        return view('test',['url'=>$sign_url]);

    }
    public function store(Request $request)
    {
        if (\session('signature_id')==$request->get('signature_id')&&$request->get('event')=="signature_request_signed"){
            $data=[
                'status'=>1,
                'signature_id'=>\session('signature_request_id')
            ];
            $sign=Sign::where('user_id',auth()->user()->id)->update($data);
            if ($sign){
                return $this->message('',0,trans('auth.sign_success'));
            }
        }

    }
    public function download(Request $request)
    {
        $signature_request_id=$request->get('signature_request_id');
        $uploads_dir=storage_path('uploads/'.$signature_request_id.'.pdf');
        if (file_exists($uploads_dir)){
            return response()->download($uploads_dir,$signature_request_id.'.pdf');
        }else{
            $down=$this->client->getFiles($signature_request_id,$uploads_dir,'pdf');
            if ($down){
                return response()->download($uploads_dir,$signature_request_id.'.pdf');
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
}
