<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
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
}
