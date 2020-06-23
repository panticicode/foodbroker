<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Cart;

class OrdersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front/sections/order');
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
}
