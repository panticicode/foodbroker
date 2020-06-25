<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('dashboard/foodbroker/index');  
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
       
        $product->update([
            'price' => $request->price
        ]);
        Session::flash('success', 'Cena uspešno ažurirana');
        return redirect()->back();
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
        Session::flash('success', 'Vidljivost proizvoda je uspešno ažurirana');
        return redirect()->back();
    }
}
