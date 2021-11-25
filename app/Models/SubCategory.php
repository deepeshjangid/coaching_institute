<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function Category()
    {
        //return $this->hasOne(Phone::class);
        return $this->belongsTo('App\Models\Category');
    }
}
