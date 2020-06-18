<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $uploads = '/images/products/';

    protected $fillable = [
    	'cat_id', 'title', 'description', 'price', 'visibility', 'image'
    ];

    public function category(){
		return $this->belongsTo('App\Models\Category');
	}
	public function getImage($photo){
		return $this->uploads . $photo;
	}
}
