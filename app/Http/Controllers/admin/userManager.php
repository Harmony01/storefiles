<?php

namespace App\Http\Controllers\admin;

use App\admin;
use App\role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;


class userManager extends Controller
{

     use RegistersUsers;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('webmaster');
    }

 public function index(){
    $roles = Role::all();
 	return view('admin.addUser', compact('roles'));
 }

 
    public function register(request $request)
    {
        $this->validate($request,[

            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'telephone' => 'required|max:255',
            'image' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
            ]);

        $user = new Admin;
            $user->name = $request->name;
            $user->position = $request->position;
            $user->telephone = $request->telephone;
            $user->image = $request->image;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $user->role()->sync($request->role, false);
            Session::flash('flash_message', 'Successful! You have added a new user');
            return redirect()->route('admin.users');
    }
     public function show()
     {
        $fetch = Admin::select('*')->orderby('created_at','desc')->get();
        return view('admin.adminUsers', compact('fetch'));
     }
}
