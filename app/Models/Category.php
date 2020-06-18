<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $uploads = '/images/categories/';

    protected $fillable = [
    	'title', 'image'
    ];

    public function getImage($photo){
		return $this->uploads . $photo;
	}

    public function products(){
		return $this->hasmany('App\Models\Product');
	}
}
