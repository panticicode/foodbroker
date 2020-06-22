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
        $weight = 0;
        $qty = 0;
        $tax = 0;

        $request = request();
        
        $product = Product::find($id);

        if(empty($request->weight))
        {
            $weight = 0;

        }
        else
        {
            $weight = $request->weight;
        }
        if(empty($request->qty))
        {
            $qty = 1;
        }
        else
        {
            $qty = $request->qty;
        }
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $qty,
            'weight' => $weight,
            'price' => $product->price,
            'taxRate' => $tax,
            'options' => [
                'quantity' => $request->quantity
            ]
        ]);
        // $carts = CartItem::create([
        //     'row_id' => $cartItem->rowId,
        //     'user_id' => 1,
        //     'qty' => $request->qty,
        //     'weight' => $request->weight
        // ]);

        Cart::associate($cartItem->rowId, 'App\Models\Product');

        return redirect('product');
       
    }
    public function cart_create()
    {
        foreach(Cart::content() as $cart)
        {
            CartItem::create([
                'row_id' => $cart->rowId,
                'user_id' => 3,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'weight' => $cart->weight
            ]);
        }
        return redirect('order');
    }
    public function weight_increase($id)
    { 
        $request = request();
        $item = Cart::get($id);
        //dd($item->options->total);
        Cart::update($id, [
            'weight'  => $item->weight + 0.5,
        ]);

        return redirect('cart');
    }
    public function weight_reduce($id)
    { 
        $item = Cart::get($id);
        if($item->weight < 0.5)
        {
            Cart::remove($id);
        }
        else
        {
            $request = request();
            $item = Cart::get($id);
            Cart::update($id, [
                'weight'  => $item->weight - 0.5
            ]);
        }
        
        return redirect('cart');
    }
    public function quantity_increase($id, $qty)
    {
        Cart::update($id, $qty + 1);
        return redirect('cart');
    }
    public function quantity_reduce($id, $qty)
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
