<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->first();
        $municipalities = Municipality::all();
        return view('home', [
            'municipalities' => $municipalities,
            'user' => $user
        ]);
    }  
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $params = $request->only(
            'name', 'cardId', 'municipality', 'address', 'email', 'phone',
        );
        if(!empty($request->password))
        {
            //dd($user->password);
            $user->password = \Hash::make($request->password); 
        }
        $user->update($params);

        session()->flash('success', 'Congratulations! Your Member has been updated');

        return redirect()->back();
    }
}
