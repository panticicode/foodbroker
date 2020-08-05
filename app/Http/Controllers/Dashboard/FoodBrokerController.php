<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\CartItem;
use Session;
use Auth;

class FoodBrokerController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->take(3)->get();

        return view('dashboard/admin/index', [
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
    public function update(Request $request, Product $product)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
    CUSTOM METHOD FOR PRODUCTS
    **/
    public function products()
    {
        $products = Product::paginate(7);
        return view('dashboard/foodbroker/products/index', [
            'products' => $products
        ]);  
    } 
    public function productUpdate(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        
        $price = $request->price;
        if($price == NULL)
        {
            $price = $product->price;
        }
        $product->update([
            'price' => $price
        ]);

        // dd($request->all());
        // Session::flash('success', 'Cena uspešno ažurirana');
        // return redirect()->back();
        return response()->json([
            'edit' => "Cena uspešno ažurirana",
            'product' => $product
        ]);
    }
    public function stock($id)
    {
        $product = Product::where('id', $id)->first();
        function checkStock($product)
        {
            if($product->visibility)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        $product->update([
            'visibility' => checkStock($product)
        ]);
        // Session::flash('success', 'Vidljivost proizvoda je uspešno ažurirana');
        // return redirect()->back();
        return response()->json([
            'visibility' => "Vidljivost je uspešno promenjena",
            'product' => $product
        ]);
    }
    public function orders()
    {
        $orders = Order::paginate(5);
        
        return view('dashboard/foodbroker/orders/index', [
            'orders' => $orders
        ]);
    }
    public function details(Order $order)
    {
        $carts = CartItem::where('user_id', $order->user_id)->get();

        // return view('dashboard/foodbroker/orders/details', [
        //     'order' => $order,
        //     'carts' => $carts
        // ]);
        return response()->json([
            'edit' => "Detalji porudzbenice",
            'carts' => $carts
        ]);
    }
    public function destroy_order(Order $order)
    {
        if(Auth::user()->isFoodBroker())
        {   
            $order->delete();

            CartItem::whereIn('product_id', [$order->id])->delete();

            session()->flash('success', 'Porudžbina je uspešno obrisana');
            return redirect()->back();
        }
        return view('privileges');
    }
}

