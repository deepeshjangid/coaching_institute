<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public function User()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\User');
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
