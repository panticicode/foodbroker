<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
		'name'
    ];

 //    public function order(){
	// 	return $this->belongsTo('App\Models\Order', 'country_id');
	// }
}
