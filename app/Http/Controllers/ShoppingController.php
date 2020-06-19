<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\Category;

class ShoppingController extends Controller
{
    public function product()
    {
        $categories = Category::paginate(7);
        $catAll = Category::all();
        $products = Product::all();
        $defaults = Product::where('cat_id', 1)->get();
        return view('front/product', [
            'categories' => $categories,
            'catAll' => $catAll,
            'products' => $products,
            'defaults' => $defaults
        ]); 
    }
    public function cart()
    {
        //Cart::destroy();
        return view('front/cart');
    }
    public function cart_add($id)
    {
        $request = request();
        $product = Product::find($id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $request->qty,
            'price' => $product->price
        ]);
        Cart::associate($cartItem->rowId, 'App\Models\Product');
        return redirect('product');
    }
    public function cart_update(Request $request)
    {
        // $contents = Cart::content();
        
        // foreach($contents as $content):
        //     Cart::update($content->rowId, $request->cart);
        // endforeach;
       
        
        // return redirect('cart');
    }
    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect('cart');
    }
}
