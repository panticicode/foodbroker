<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $uploads = '/images/products/';

    protected $fillable = [
    	'cat_id', 'title', 'description', 'price', 'visibility', 'quantity', 'image'
    ];

    public function category(){
		return $this->belongsTo('App\Models\Category', 'cat_id');
	}
	public function getCount()
    {
        return DB::table('products')->where('cat_id',$this->id);
    }
	public function getImage($photo){
		return $this->uploads . $photo;
	}
}
