<?php

namespace App\Console\Commands;

use App\Invite;
use App\Mail\SendPdfMail;
use App\Service\pdf;
use App\Service\zip;
use App\Sign;
use HelloSign\Client;
use HelloSign\SignatureRequest;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $client_id;
    private $client;
    private $request;
    private $embed_request;

    public function __construct()
    {
        parent::__construct();
        $api_key = '848248605559a4d9cace71abd751f0ccd1f3da944ac12252d9021e0396e5db9b';
        $client_id = '4912850865d71257e073d540c5764a2f';
        $this->client_id = $client_id;
        $client = new Client($api_key);
        $this->client = $client;
        $request = new SignatureRequest();
//        $request->enableTestMode();
        $this->request = $request;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mail_arr = ['wm110957@yahoo.com.tw'];
        $invite = Invite::whereIn('invitees', $mail_arr)->get(['id', 'invitees', 'invitee_id']);
//        print_r($invite);
        foreach ($invite as $key => $value) {
            $dest = $this->download($value->id, $value->invitee_id);
            Mail::to('871609160@qq.com')->queue(new SendPdfMail('111', '1111', $dest));
        }
    }

    public function download($invite_id, $invitee_id)
    {
//        dd($request->get('invite_id'));
        $signs = Sign::where('invite_id', $invite_id)->get();
        $user_data = DB::table('userdata')->where('id', $invitee_id)->first(['languagepreference']);

        $un_water_files = [];
        if ($user_data->languagepreference == 'hk') {
            $un_water_files = array_merge($un_water_files, [storage_path('4_hk.pdf'), storage_path('5_hk.pdf')]);
        } else {
            $un_water_files = array_merge($un_water_files, [storage_path('4.pdf'), storage_path('5.pdf')]);
        }
        foreach ($signs as $key => $value) {
            if ($value['signature_request_id']) {

                $uploads_dir = storage_path('uploads/' . $value['signature_request_id'] . '.pdf');
                if (file_exists($uploads_dir)) {
                    array_push($un_water_files, $uploads_dir);
                } else {
                    $down = $this->client->getFiles($value['signature_request_id'], $uploads_dir, 'pdf');
//                    print_r($down);
//                    exit();

                    if ($down) {
                        array_push($un_water_files, $uploads_dir);
                    }
                }

            }
        }
        $pdf = new pdf();
//        $water_files=[];
////          dd($un_water_files);
//        if (!empty($un_water_files)){
//            foreach ($un_water_files as $value){
//                $path=storage_path('uploads/'.uniqid().'.pdf');
//
//                $pdf->watermark($value,$path);
//
//                array_push($water_files,$path);
//            }
//        }
        $zip = new zip();
        $path = 'uploads/' . uniqid() . '.zip';
        $zip_dest = storage_path($path);
        $zip->zipFiles($zip_dest, $un_water_files);

        return $zip_dest;


//        return response()->download($zip_dest,'Offering.zip');
    }

}
