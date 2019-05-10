<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\Jobs\SendEmail;
use App\Service\pdf;
use App\Service\zip;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Mpdf\Mpdf;

class HelloSignController extends Controller
{
    public function index(Request $request)
    {
        $string='{
"json": "{\"event\":{\"event_type\":\"signature_request_signed\",\"event_time\":\"1557469171\",\"event_hash\":\"04e0e0ed5bb17f720ecec0b331eea70dbea4dbcafeb0b1982bd15483b4cd5d36\",\"event_metadata\":{\"related_signature_id\":\"921d563dc84c0b646b3fb5ccf75b7437\",\"reported_for_account_id\":\"614459d32d638e26a7a7e4860bfc94b618f9e05d\",\"reported_for_app_id\":null}},\"account_guid\":\"614459d32d638e26a7a7e4860bfc94b618f9e05d\",\"client_id\":null,\"signature_request\":{\"signature_request_id\":\"fca24b5d2b7d1588c4443851e06ac3954ae48c95\",\"test_mode\":true,\"title\":\"Purchase Order\",\"original_title\":\"Purchase Order\",\"subject\":\"Purchase Order\",\"message\":\"Glad we could come to an agreement.\",\"metadata\":{\"signed_on_domain\":\"13.228.105.143\"},\"is_complete\":true,\"is_declined\":false,\"has_error\":false,\"custom_fields\":[{\"name\":\"name\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_10\",\"editor\":null,\"value\":\"kelly\"},{\"name\":\"number\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_11\",\"editor\":null,\"value\":\"2\"},{\"name\":\"money\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_12\",\"editor\":null,\"value\":\"2,800\"},{\"name\":\"day\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_13\",\"editor\":null,\"value\":\"10\"},{\"name\":\"month\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_14\",\"editor\":null,\"value\":\"05\"},{\"name\":\"money\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_15\",\"editor\":null,\"value\":\"2,800\"},{\"name\":\"name\",\"type\":\"text\",\"required\":null,\"api_id\":\"228619_16\",\"editor\":null,\"value\":\"kelly\"}],\"response_data\":[{\"name\":null,\"type\":\"signature\",\"required\":true,\"api_id\":\"228619_17\",\"value\":null,\"signature_id\":\"921d563dc84c0b646b3fb5ccf75b7437\"}],\"signing_url\":null,\"signing_redirect_url\":null,\"final_copy_uri\":\"\\/v3\\/signature_request\\/final_copy\\/fca24b5d2b7d1588c4443851e06ac3954ae48c95\",\"files_url\":\"https:\\/\\/api.hellosign.com\\/v3\\/signature_request\\/files\\/fca24b5d2b7d1588c4443851e06ac3954ae48c95\",\"details_url\":\"https:\\/\\/app.hellosign.com\\/home\\/manage?guid=fca24b5d2b7d1588c4443851e06ac3954ae48c95\",\"requester_email_address\":\"mjohnson@chinabridgegroup.com\",\"signatures\":[{\"signature_id\":\"921d563dc84c0b646b3fb5ccf75b7437\",\"has_pin\":false,\"signer_email_address\":\"kw@shanghaisupport.com\",\"signer_name\":\"kelly\",\"signer_role\":\"member\",\"order\":null,\"status_code\":\"signed\",\"signed_at\":1557469171,\"last_viewed_at\":1557469094,\"last_reminded_at\":null,\"error\":null}],\"cc_email_addresses\":[],\"template_ids\":[\"cb9a043974c528e676d92d37d228a9a90ede2d38\"],\"client_id\":\"4912850865d71257e073d540c5764a2f\"}}"
}';
        $string=json_decode($string,true)['json'];
        dd(json_decode($string,true));
//       $pdf=new pdf();
//       $page=$request->get('page',1);
//       $pdf->show(storage_path($page.'.wa.pdf'));
//      $this->dispatch(new SendEmail('871609160@qq.com',$email_cont));
//        Mail::send('email.index',['cont'=>'123123'],function($message){
//            $message->to('871609160@qq.com');
//        });
//        $email_cont=Emailtitles::getone('invite_sign',session('lang','en'));
//        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
//        $file=str_replace('{url}',url('/user/index'),$file);
//        Mail::to('871609160@qq.com')->queue(new \App\Mail\SendEmail($file,$email_cont->title));
    }
}
