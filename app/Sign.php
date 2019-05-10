<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $guarded=[];
    protected $appends=[
        'status_text'
    ];

    public function getStatusTextAttribute($value)
    {
        if ($this->status==1){
            if($result=__t("15574575424182")){
                return $result;
            }else{ return '';};
           
        }else{
           if($result=__t("15574575672843")){return $result;}else{ return '';};
          
        }
    }
}
