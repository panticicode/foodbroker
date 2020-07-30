<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Models\Municipality;
use Auth;

class UsersController extends Controller
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
        $users = User::where('id', '!=', Auth()->id())->paginate(7);
        $roles = Role::all();
        return $this->renderTemplate('dashboard/admin/users/index',[
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::all();
        // return $this->renderTemplate('dashboard/admin/users/create', [
        //     'roles' => $roles
        // ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if(Auth::user()->isAdmin())
        {    
            // dd($request->all());
            $user->fill($request->all());
            $user->password = \Hash::make($request->password);
            $user->role_id = $request->role_id;
            $userRoles = Role::all();
            $user->save();
            // session()->flash('success', 'Novi korisnik je uspešno kreiran');
            // return redirect(route('users.index'));
            return response()->json([
                'create' => "Novi korisnik je uspešno kreiran",
                'user' => $user,
                'userRoles' => $userRoles
            ]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $roles = Role::all();
        // $municipalities = Municipality::all();
        // return $this->renderTemplate('dashboard/admin/users/edit', [
        //     'user' => $user,
        //     'roles' => $roles,
        //     'municipalities' => $municipalities
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Auth::user()->isAdmin())
        {    
            $params = $request->only(
                'userId', 'name', 'role_id', 'email', 'phone'
            );
            $userRoles = Role::all();
            if(!empty($request->password))
            {
                $request->validate([
                    'password' => 'required|string|min:3'
                ]);
                $user->password = \Hash::make($request->password);
                session()->flash('success', 'Uspešno ste promenili lozinu');
            }
            //dd($params);  
            $user->update($params);
            // session()->flash('success', 'Korisnik je uspešno ažuriran');
            // return redirect(route('users.index'));
             return response()->json([
                'edit' => "Korisnik je uspešno ažuriran",
                'user' => $params,
                'userRoles' => $userRoles
            ]);
        }
        return view('privileges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()->isAdmin())
        {
            $user->delete();
            //session()->flash('success', 'Korisnik je uspešno obrisan');
            return response()->json([
                'danger' => 'Korisnik je uspešno obrisan'
            ]);
        }
        return view('privileges');
    }
}
