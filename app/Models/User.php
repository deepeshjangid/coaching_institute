<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public function Student()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\Student');
    }
    public function Category()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\Category');
    }
    public function SubCategory()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function Course()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\Course');
    }
}