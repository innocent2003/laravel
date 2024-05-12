<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
     public function index(){
        $users = User::all();
        return view('userList',compact('users'));
    }
    public function login(){
        return view("login");
    }
    public function register(){
        return view("register");
    }
    public function registerUser(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',

        ]);


        $user = new User();
        $user->name = $request->username;

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login');

    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('user',$user);
                return redirect('/');


            }else{
                return back()->with('fail','Password not matches');
            }
        }else{
            return back()->with('fail','this email is not registered');
        }

    }
}
