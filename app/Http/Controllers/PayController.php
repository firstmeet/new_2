<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PayController extends Controller
{
  
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
		
		
		return view('pay');
    
    }


    public function pay()
    {
		
		$currency='cny';
	

		/**************************请求参数**************************/

		$api_key=config('stripe_api_key_private');

		$description = $order_id;

		//$currency='cny';

		$amount = $allprice*100;

		/************************************************************/

		if($_POST['stripeToken']){

			$stripeToken=$_POST['stripeToken'];
			//4242424242424242
			$sh='curl https://api.stripe.com/v1/charges -u '.$api_key.': -d amount='.$amount.' -d currency='.$currency.' -d description="'.$description.'" -d source='.$stripeToken;
			//debug($sh,'stripe_process_payment');
			//die($sh);
			$rs=shell_exec($sh);

			$js=json_decode($rs,true);

			//var_dump($js);
			if($js['status']=='succeeded'){
				
			}else if($js['error']){
			}else{
			}
		}else{
		}

		exit;
    
    }

  
}
