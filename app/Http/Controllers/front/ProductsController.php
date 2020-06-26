<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $defaults = Product::where('cat_id', 1)->get();
        // $products = Product::where('visibility', true)->get();
        // $defaults = Product::where('cat_id', 1)
        //                     ->where('visibility', true)->get();

        return view('front/sections/product', [
            'categories' => $categories,
            'products' => $products,
            'defaults' => $defaults
        ]); 
    }
}
