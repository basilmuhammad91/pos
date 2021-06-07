<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product()
    {
    	return $this->hasMany('App\Models\Product','category_id','category_id');
    }

}