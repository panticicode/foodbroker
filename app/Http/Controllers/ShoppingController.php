<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartItem;

class ShoppingController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $products = Product::all();
        $defaults = Product::where('cat_id', 1)->get();
        return view('front/sections/product', [
            'categories' => $categories,
            'products' => $products,
            'defaults' => $defaults
        ]); 
    }
    public function cart()
    {
        return view('front/sections/cart');
    }
    public function order()
    {
        return view('front/sections/order');
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

        // $carts = CartItem::create([
        //     'row_id' => $cartItem->rowId,
        //     'user_id' => 1,
        //     'qty' => $request->qty
        // ]);

        Cart::associate($cartItem->rowId, 'App\Models\Product');

        return redirect('product');
    }
    public function cart_create(Request $request)
    {
        foreach(Cart::content() as $cart)
        {
            CartItem::create([
                'row_id' => $cart->rowId,
                'user_id' => 3,
                'product_id' => $cart->id,
                'qty' => $cart->qty
            ]);
        }
        return redirect('cart');
    }
    public function cart_increase($id, $qty)
    { 
        $request = request();
        Cart::update($id, $qty + 1);
        return redirect('cart');
    }
    public function cart_reduce($id, $qty)
    {
        Cart::update($id, $qty - 1);
        return redirect('cart');
    }
    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect('cart');
    }
}
