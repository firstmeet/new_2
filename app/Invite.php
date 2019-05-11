<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded=[];

    public function signs()
    {
        return $this->hasMany(Sign::class,'user_id','invitee_id');
    }

}
