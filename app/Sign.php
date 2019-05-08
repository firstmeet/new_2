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
            return __t("signed");
        }else{
            return __t('unsigned');
        }
    }
}
