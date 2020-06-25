<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Session;
use Auth;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**PREVENT TO ACCESS IF NOT ADMIN**/
    private function renderTemplate($template, $data)
    {
        if(Auth::user()->isAdmin())
        {    
            return view($template, $data);
        }
        return view('privileges');
    }
    /**PREVENT TO ACCESS IF NOT ADMIN**/
    public function index()
    {
        $products = Product::paginate(7);

        return $this->renderTemplate('dashboard/admin/products/index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return $this->renderTemplate('dashboard/admin/products/create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);
        $image = $request->image;
        $imageNewName = time(). $image->getClientOriginalName();
        $image_path = 'images/products/';
        $image->move($image_path, $imageNewName);
       
        if($request->visibility == 'NE')
        {
            $visibility = 0;
        }
        else
        {
            $visibility = 1;
        }
        if($request->productType == 'KOM')
        {
            $productType = 1;
        }
        else
        {
            $productType = 0;
        }
        $product = Product :: create([
            'title' => $request->title,
            'cat_id' => $request->category,
            'price' => $request->price,
            'image' => $imageNewName,
            'description' => $request->description,
            'visibility' => $visibility,
            'quantity' => $productType 
        ]);
        Session::flash('success', 'Uspešno ste dodali novi proizvod');
        return redirect()->route('products.index');
        
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return $this->renderTemplate('dashboard/admin/products/edit', [
            'product' => $product,
            'categories' => $categories
        ]);
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
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('image')):
            $image = $request->image;
            $image_path = 'images/products/';
            $imageNewName = time() . $image->getClientOriginalName();
            $image->move($image_path, $imageNewName);
            $product->image = $imageNewName;
        endif; 
        if($request->visibility == 'NE'):
            $visibility = 0;
        else:
            $visibility = 1;
        endif;
        if($request->productType == 'KOM'):
            $productType = 1;
        else:
            $productType = 0;
        endif;

        $product->title = $request->title;
        $product->cat_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description; 
        $product->visibility = $visibility;
        $product->quantity = $productType;
        //dd($request->all());
        $product->save();
        Session::flash('success', 'Proizvod je uspešno ažuriran');
        return redirect()->route('products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //dd('images/products/' . $product->image);
        if(!empty($product->image))
        { 
           $image_path = 'images/products/'; 
           if(file_exists($image_path . $product->image))
           {
                unlink($image_path . $product->image); 
           }
           
           if($product->image !== NULL)
           { 
                $product->delete();
           }
        }else{ 
            $product->delete();
        } 
        session()->flash('success', 'Proizvod je uspešno obrisan');
        return redirect(route('products.index'));
    }
}
