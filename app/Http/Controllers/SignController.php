<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
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
        $template_id="cb9a043974c528e676d92d37d228a9a90ede2d38";
        $request = new TemplateSignatureRequest();
        $request->enableTestMode();
        $request->setTemplateId($template_id);
        $request->setSubject('Purchase Order');
        $request->setMessage('Glad we could come to an agreement.');
        $request->setSigner('member', $email, $sign_info['name']);
//$request->setCC('Accounting', '871609160@qq.com');
        $request->setCustomFieldValue('money', $this->umoney(1400*$sign_info['number']));
//        $request->setCustomFieldValue("number",$sign_info['number']);
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
       $string=json_decode($string,true)['json'];
       $string=json_decode($string,true);
       if ($string['event_type']=='signature_request_signed') {
          Sign::where('signature_request_id',$string['signature_request']['response_data'][0]['signature_id'])->update(['is_signed'=>1]);
       }
    }
    public function numberToChinese($number)
    {
        $number = intval($number);
        $bit = array("零", "一", "二", "三", "四", "五", "六", "七", "八", "九", "十");
        //各位数
        if ($number <= 10) {
            return $bit[$number];
        }


        //十位数
        if($number < 100){
            $array = str_split($number);
            if($array[0] < 2){
                return $bit[10].$bit[$array[1]];
            }else{
                if($array[1] == 0){
                    return $bit[$array[0]].$bit[10];
                }else{
                    return $bit[$array[0]].$bit[10].$bit[$array[1]];
                }
            }
        }

        //百位数
        if($number < 1000){
            $array = str_split($number);
            if($array[1] == 0 && $array[2] == 0){
                return $bit[$array[0]]."百";
            }elseif($array[1] == 0 && $array[2] != 0){
                return $bit[$array[0]]."百".$bit[$array[1]].$bit[$array[2]];
            }elseif($array[1] != 0 && $array[2] == 0 ){
                return $bit[$array[0]]."百".$bit[$array[1]].$bit[10];
            }else{
                return $bit[$array[0]]."百".$bit[$array[1]].$bit[10].$bit[$array[2]];
            }

        }
        //千位数
        if($number < 10000){
            $array = str_split($number);
            if($array[1] == 0 && $array[2] == 0 && $array[3] == 0){
                return $bit[$array[0]]."千";
            }elseif($array[1] == 0 && $array[2] != 0 && $array[3] != 0){
                return $bit[$array[0]]."千".$bit[$array[1]].$bit[$array[2]].$bit[10].$bit[$array[3]];
            }elseif($array[1] == 0 && $array[2] == 0 && $array[3] != 0){
                return $bit[$array[0]]."千".$bit[$array[1]].$bit[$array[3]];
            }elseif($array[1] == 0 && $array[2] != 0 && $array[3] == 0){
                return $bit[$array[0]]."千".$bit[$array[1]].$bit[$array[2]].$bit[10];
            }elseif($array[1] != 0 && $array[2] == 0 && $array[3] == 0){
                return $bit[$array[0]]."千".$bit[$array[1]]."百";
            }elseif($array[1] != 0 && $array[2] != 0 && $array[3] == 0){
                return $bit[$array[0]]."千".$bit[$array[1]]."百".$bit[$array[2]].$bit[10];
            }elseif($array[1] != 0 && $array[2] == 0 && $array[3] != 0){
                return $bit[$array[0]]."千".$bit[$array[1]]."百".$bit[$array[2]].$bit[$array[3]];
            }else{
                return $bit[$array[0]]."千".$bit[$array[1]]."百".$bit[$array[2]].$bit[10].$bit[$array[3]];
            }
        }

        return $number;
    }
    public function umoney($num,$type="usd") {
        global $numTable,$commaTable,$moneyType;

//global $numTable;
        $numTable[0]="ZERO ";
        $numTable[1]="ONE ";
        $numTable[2]="TWO ";
        $numTable[3]="THREE ";
        $numTable[4]="FOUR ";
        $numTable[5]="FIVE ";
        $numTable[6]="SIX ";
        $numTable[7]="SEVEN ";
        $numTable[8]="EIGHT ";
        $numTable[9]="NINE ";
        $numTable[10]="TEN ";
        $numTable[11]="ELEVEN ";
        $numTable[12]="TWELVE ";
        $numTable[13]="THIRTEEN ";
        $numTable[14]="FOURTEEN ";
        $numTable[15]="FIFTEEN ";
        $numTable[16]="SIXTEEN ";
        $numTable[17]="SEVENTEEN ";
        $numTable[18]="EIGHTEEN ";
        $numTable[19]="NINETEEN ";
        $numTable[20]="TWENTY ";
        $numTable[30]="THIRTY ";
        $numTable[40]="FORTY ";
        $numTable[50]="FIFTY ";
        $numTable[60]="SIXTY ";
        $numTable[70]="SEVENTY ";
        $numTable[80]="EIGHTY ";
        $numTable[90]="NINETY ";

        $commaTable[0]="HUNDRED ";
        $commaTable[1]="THOUSAND ";
        $commaTable[2]="MILLION ";
        $commaTable[3]="MILLIARD ";
        $commaTable[4]="BILLION ";
        $commaTable[5]="????? ";

//单位
        $moneyType["usd"]="DOLLARS ";
        $moneyType["usd_1"]="CENTS ONLY";
        $moneyType["rmb"]="YUAN ";
        $moneyType["rmb_1"]="FEN ONLY";


        if($type=="") $type="usd";
        $fnum = fmoney($num);
        $numArray = explode(",",$fnum);
        $resultArray = array();
        $k=0;
        $cc=count($numArray);
        for($i = 0; $i < count($numArray); $i++) {
            $num_str = $numArray[$i];
//echo "<br>";
//小数位的处理400.21
            if(eregi("\.",$num_str)) {
                $dotArray = explode(".",$num_str);
                if($dotArray[1] != 0) {
                    $resultArray[$k++]=format3num($dotArray[0]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)];
                    $resultArray[$k++]="AND ";
                    $resultArray[$k++]=format3num($dotArray[1]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)."_1"];
                } else {
                    $resultArray[$k++]=format3num($dotArray[0]+0);
                    $resultArray[$k++]=$moneyType[strtolower($type)];
                }
            } else {
//非小数位的处理
                if(($num_str+0)!=0) {
                    $resultArray[$k++]=format3num($num_str+0);
                    $resultArray[$k++]=$commaTable[--$cc];
//判断：除小数外其余若不为零则加and
                    for($j=$i; $j <= $cc; $j++) {
//echo "<br>";
//echo $numArray[$j];
                        if($numArray[$j] !=0) {
                            $resultArray[$k++]="AND ";
                            break;
                        }
                    }
                }
            }
        }
        return join("",$resultArray);
    }



    function format3num($num) {
        global $numTable,$commaTable;
        $numlen = strlen($num);
        for($i = 0,$j = 0;$i < $numlen; $i++) {
            $bitenum[$j++] = substr($num,$i,1);
        }
        if($num==0) return "";
        if($numlen == 1) return $numTable[$num];
        if($numlen == 2) {
            if($num <= 20) return $numTable[$num];
//第一位不可能零
            if($bitenum[1]==0) {
                return $numTable[$num];
            } else {
                return trim($numTable[$bitenum[0]*10])."-".$numTable[$bitenum[1]];
            }

        }
//第一个不可能为零
        if($numlen == 3) {
            if($bitenum[1]==0 && $bitenum[2]==0) {
//100
                return $numTable[$bitenum[0]].$commaTable[0];
            } elseif($bitenum[1]==0) {
//102
                return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[2]];
            } elseif ($bitenum[2]==0) {
//120
                return $numTable[$bitenum[0]].$commaTable[0].$numTable[$bitenum[1]*10];
            } else {
//123
                return $numTable[$bitenum[0]].$commaTable[0].trim($numTable[$bitenum[1]*10])."-".$numTable[$bitenum[2]];
            }
        }
        return $num;
    }

}
