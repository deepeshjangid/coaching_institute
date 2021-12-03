<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyTuitonPayment extends Model
{
    public function UserStudent()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function UserTutor()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\User', 'parent_id');
    }
}
