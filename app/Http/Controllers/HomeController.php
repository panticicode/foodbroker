<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(7);
    	$catAll = Category::all();
    	$products = Product::all();
    	$defaults = Product::where('cat_id', 1)->get();
       
        //dd($defaults);
    	return view('front/home', [
    		'categories' => $categories,
    		'catAll' => $catAll,
    		'products' => $products,
    		'defaults' => $defaults
    	]);
    }
}
