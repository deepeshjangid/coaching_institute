<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function SubCategory()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
    public function Course()
    {
        return $this->hasOne('App\Models\Course');
    }
}
