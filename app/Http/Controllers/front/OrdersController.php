<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Orders\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Order;
use Session;
use Auth;
use Cart;

class OrdersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $countries = Country::all();
        return view('front/sections/order', [
            'countries' => $countries,
            'cartItems' => $cartItems
        ]);
    }
    public function cart_create()
    {
        return redirect('order');
    }
    public function push()
    {
        Session::flash('success', 'Uspešno ste poslali Vašu porudžbenicu');
        return redirect()->route('push'); 
    }
    public function order_store(Request $request)
    {
        foreach(Cart::content() as $cart)
        {
            CartItem::create([
                'row_id' => $cart->rowId,
                'user_id' => Auth::id(),
                'product_id' => $cart->id,
                'name' => $cart->name,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'weight' => $cart->weight
            ]);
        }
        //dd($request->product);
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'delivery_date' => ['required', 'date'],
            'delivery_time' => ['required', 'date_format:H:i'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:5'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        $order = Order::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'company' => $request->company,
            'user_id' => Auth::id(),
            'country_id' => $request->country,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'delivery_date' => $request->delivery_date,
            'delivery_time' => $request->delivery_time,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->content
        ]);

        $cart = CartItem::where('user_id', Auth::id())->get();

        $data = [
            'email'   => 'panticicode@gmail.com',/**OVDE UBACI EMAIL**/
            'name'    => $order->firstname . " " . $order->lastname,
            'subject' => 'Porudžbenica broj' . " " . $order->id,
            'content' =>  $order,
            'cartData' => $cart
        ];
        //Mail::to($data['email'])->send(new SendEmail($data));

        return redirect()->route('order.push');
    }
    // public function destroyCart()
    // {
    //     $cart = CartItem::whereIn('user_id', [Auth::id()]);
    //     $cart->delete();
    //     Session::flash('success', 'Uspešno ste poslavi Vašu porudžbenicu');
    //     return redirect('/');
    // }
}
