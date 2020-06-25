<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**PREVENT TO ACCESS IF NOT ADMIN**/
    private function renderTemplateWithData($template, $data)
    {
        if(Auth::user()->isAdmin())
        {    
            return view($template, $data);
        }
        return view('privileges');
    }
    private function renderTemplate($template)
    {
        if(Auth::user()->isAdmin())
        {    
            return view($template);
        }
        return view('privileges');
    }
    /**PREVENT TO ACCESS IF NOT ADMIN**/
    public function index()
    {
        $categories = Category::paginate(7);

        return $this->renderTemplateWithData('dashboard/admin/categories/index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->renderTemplate('dashboard/admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAdmin())
        {  
            $this->validate($request, [
                'category' => 'required',
                'image' => 'required|image'
            ]);

            $image = $request->image;
            $imageNewName = time(). $image->getClientOriginalName();
            $image_path = 'images/categories/';
            $image->move($image_path, $imageNewName);

            $category = new Category;
            $category->title = $request->category;
            $category->image = $imageNewName;
            $category->save();
            Session::flash('success', 'Uspešno ste kreirali novu kategoriju');
            return redirect()->route('categories.index');
        }
        return view('privileges');
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
    public function edit(Category $category)
    {
         return $this->renderTemplateWithData('dashboard/admin/categories/edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(Auth::user()->isAdmin())
        {
            $this->validate($request, [
                'category' => 'required' 
            ]);
            if($request->hasFile('image')):
                $image = $request->image;
                $image_path = 'images/categories/';
                $imageNewName = time() . $image->getClientOriginalName();
                $image->move($image_path, $imageNewName);
                $category->image = $imageNewName;
            endif; 

            $category->title = $request->category;
            
            $category->save();
            Session::flash('success', 'Kategorija je uspešno ažurirana');
            return redirect()->route('categories.index');
        }
        return view('privileges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Auth::user()->isAdmin())
        {
            if(!empty($category->image))
            { 
               $image_path = 'images/categories/'; 
               if(file_exists($image_path . $category->image))
               {
                    unlink($image_path . $category->image); 
               }
               
               if($category->image !== NULL)
               { 
                    $category->delete();
               }
            }else{ 
                $category->delete();
            } 
            session()->flash('success', 'Kategorija je uspešno obrisana');
            return redirect(route('categories.index'));
        }
        return view('privileges');
    }
}
