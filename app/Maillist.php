<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maillist extends Model
{
   
    static public function add($em,$code,$lang){
        $rs=App\Emailtitles::getone($code,$lang);
		
		self::insert([
			'em'	=>	$toName,
			'cont'	=>	self::putbody($cont),
			'title'	=>	$tpl['title'],
			'frname'	=>	$tpl['frname'],
			'stime'	=>time(),
			'status'	=>	0,
		]);
    }
	
	static public function putbody($cont,$file_name=false){
		if(!$file_name){
			if(!is_dir('email')) mkdir('email');
			$file_name="email/".uniqid().'.html';
		}
		file_put_contents($file_name,$cont);
		return $file_name;
	}
}