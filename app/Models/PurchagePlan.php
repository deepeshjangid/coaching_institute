<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchagePlan extends Model
{
    public function User()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\User');
    }
    public function SubscriptionPlan()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\SubscriptionPlan');
    }
}