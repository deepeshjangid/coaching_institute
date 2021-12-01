<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function User()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\User');
    }
}
