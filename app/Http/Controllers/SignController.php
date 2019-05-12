<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Http\Requests\SignUpdateRequest;
use App\Invite;
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
        $status=$request->get('status');
        $invite=Invite::with('signs')->where('invitee_id',auth()->user()->id)->get();
//        dd($invite);
        $arr=[];
        foreach ($invite as $key=>&$value){
            $i=0;
            foreach ($value['signs'] as $key1=>$value1){
                if ($value1['status']==1){
                    $i++;
                }
            }
            $value['sign']=$value['signs'][count($value['signs'])-1];

        }
//        if (!is_null($status)){
//            $invite=$arr;
//        }

        return $this->message($invite);
    }

    public function create()
    {
        $email=auth()->user()->username;
        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
//        $client = new Client('rj@shanghaisupport.com','elev0607');
        $template_id="24772c4fe45d85d1c5a58faf758dad58042d4a6e";
        $request = new TemplateSignatureRequest();
        $request->enableTestMode();
        $request->setTemplateId($template_id);
//        $request->setSubject('Purchase Order');
//        $request->setMessage('Glad we could come to an agreement.');
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
        $sign_info->signature_id=$signature_id;
        $sign_info->signature_request_id=$response->signature_request_id;
        $sign_info->save();
//            'signature_request_id'=>\session('signature_id')]);
        return view('user.sign',['url'=>$sign_url]);

    }
    public function store(Request $request)
    {
        if ($request->get('event')=="signature_request_signed"){
            $data=[
                'status'=>1
            ];
            $sign=Sign::where('signature_id',$request->get('signature_id'))->update($data);
            if (Sign::where([['user_id',auth()->user()->id],['status','=',1]])->orderBy('id','desc')->first()->status==1){
                Session::put('sign_status',1);
            }
            if ($sign){
                return $this->message('',0,__('15423548318740'));
            }
        }

    }
    public function download(Request $request)
    {
//        dd($request->get('invite_id'));
          $signs=Sign::where('invite_id',$request->get('invite_id'))->get();
          $un_water_files=[storage_path('2.pdf'),storage_path('3.pdf')];

          foreach ($signs as $key=>$value){
              if ($value['signature_request_id']){
              $uploads_dir=storage_path('uploads/'.$value['signature_request_id'].'.pdf');
              if (file_exists($uploads_dir)){
                  array_push($un_water_files,$uploads_dir);
              }else{
                  $down=$this->client->getFiles($value['signature_request_id'],$uploads_dir,'pdf');

                  if ($down){
                      array_push($un_water_files,$uploads_dir);
                  }
              }

              }
          }
          $pdf=new pdf();
          $water_files=[];
//          dd($un_water_files);
          if (!empty($un_water_files)){
          foreach ($un_water_files as $value){
              $path=storage_path('uploads/'.uniqid().'.pdf');

                  $pdf->watermark($value,$path);

              array_push($water_files,$path);
          }
          }
          $zip=new zip();
          $zip_dest=storage_path(('uploads/'.$request->get('invite_id').'.zip'));
          $zip->zipFiles($zip_dest,$water_files);

          return response()->download($zip_dest,'Offering.zip');
    }
    public function update(Request $request)
    {
        if (!$request->get('name')){
            return back()->with('error',__t(15574791686683));
        }
        if (!$request->get('number')){
            return back()->with('error',__t(15574792197118));

        }
        if (!$request->file('picture')){
            return back()->with('error',__t(15575813616026));
        }
        $invite=Invite::where('invitee_id',auth()->user()->id)->orderBy('id','desc')->first();

        $sign=Sign::where('invite_id',$invite->id)->orderBy('id','desc')->first();

//        dd($invite);
         $arr=['jpg','jpeg','png'];
        if ($file=$request->file('picture')){
            $ext=$file->getClientOriginalExtension();
            if (!in_array($ext,$arr)){
                return back()->with('error','not a image');
            }
            $file_name=uniqid().'.'.$ext;
        }
//        dd($file_name);
        $file=$file->move(storage_path('uploads/images'),$file_name);
        $sign->name=$request->get('name');
        $sign->number=$request->get('number');
        $sign->picture=$file_name;

        if ($sign->save()){
            return redirect('/sign/create');
        }else{
            return back()->with('error',__t("failed"));
        }
    }
    public function callback(Request $request)
    {
       $string=$request->all();
       $string=json_decode($string['json'],true);
       if ($string['event']['event_type']=='signature_request_signed') {
          Sign::where('signature_id',$string['signature_request']['response_data'][0]['signature_id'])->update(['is_signed'=>1]);
       }
    }

    public function sign_pdf()
    {
        $sign_info=Sign::where('user_id',auth()->user()->id)->count();
        $this->request->addSigner(auth()->user()->username,auth()->user()->username);
        $this->request->addFile(storage_path('Confidentiality Provision.pdf'));
        $embed_request=new EmbeddedSignatureRequest($this->request,$this->client_id);
        $response = $this->client->createEmbeddedSignatureRequest($embed_request,$this->client_id);
        $signatures   = $response->getSignatures();
        $signature_id = $signatures[0]->getId();
        $response_2 = $this->client->getEmbeddedSignUrl($signature_id);

// Store it to use with the embedded.js HelloSign.open() call
        $sign_url = $response_2->getSignUrl();
            $last=Sign::where('user_id',auth()->user()->id)->orderBy('id')->first();

            $last->signature_id=$signature_id;
            $last->signature_request_id=$response->signature_request_id;
            $last->save();


        return view('user.sign_pdf',['url'=>$sign_url]);

    }
    private function sign_template($template_id)
    {

    }

}
