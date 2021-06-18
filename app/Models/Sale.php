<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    use HasFactory;

    public $primaryKey = 'sale_id';

    public $timestamps = false;

    public function user()
    {
    	return $this->hasOne('App\Models\User','id','user_id');
    }

    public function customer()
    {
    	return $this->hasOne('App\Models\Customer','customer_id','customer_id');
    }

    public function receiver()
    {
    	return $this->hasOne('App\Models\Customer','customer_id','receiver_id');
    }

    public function product_sale()
    {
    	return $this->hasMany('App\Models\ProductSale','sale_id','sale_id');
    }

}
