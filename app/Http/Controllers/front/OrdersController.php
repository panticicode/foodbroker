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
        $countries = Country::all();
        return view('front/sections/order', [
            'countries' => $countries
        ]);
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
    public function order_store(Request $request)
    {
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
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
        $data = [
        'email'   => 'panticicode@gmail.com',
        'name'    => $order->firstname . " " . $order->lastname,
        'subject' => 'Porudžbenica broj 8',
        'content' =>  $order
        ];
        //dd($data['email']);
        Mail::bcc($data['email'])
                                ->send(new SendEmail($data));
        Session::flash('success', 'Uspešno ste poslavi Vašu porudžbenicu');
        return redirect('/');
    }
}
