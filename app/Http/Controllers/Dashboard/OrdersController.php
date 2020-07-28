<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\CartItem;
use Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }
    /**LOGIC FOR PREVENT ACCESS IF NOT ADMIN**/
    private function renderTemplate($template, $data)
    {
        if(Auth::user()->isAdmin())
        {
            return view($template, $data);
        }
        return view('privileges');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);
        
        return $this->renderTemplate('dashboard/admin/orders/index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Order $order)
    {
        $carts = CartItem::where('user_id', $order->user_id)->get();

        return view('dashboard/admin/orders/details', [
            'order' => $order,
            'carts' => $carts
        ]);
    }
    public function destroy(Order $order)
    {
        if(Auth::user()->isAdmin())
        {   
            $order->delete();

            CartItem::whereIn('product_id', [$order->id])->delete(); 

            session()->flash('success', 'Porudžbina je uspešno obrisana');
            return redirect(route('orders.index'));
        }
        return view('privileges');
    }
}
