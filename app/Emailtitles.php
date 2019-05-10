<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emailtitles extends Model
{
    protected $table = 'emailtitles';
	public $timestamps = false;
   
   	static public function getone($vgroup,$lang){
        return self::where('vgroup',$vgroup)->where('lang',$lang)->first();
    }
}
