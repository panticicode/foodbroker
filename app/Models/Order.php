<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'firstname', 'lastname', 'user_id', 'company', 'country_id', 'address', 'apartment', 'delivery_date', 'delivery_time', 'city', 'postal_code', 'phone', 'email', 'content'
    ];
    // public function country()
    // {
    // 	return $this->belongsTo('App\Models\Order', 'category_id');
    // }
}
