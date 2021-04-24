<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    //---User Login Function -------//
    public function login(Request $req)
    {
        $user =  User::where(['email' => $req->email])->first();
        if(!$user || !Hash::check( $req->password , $user->password ))
        {
          echo "<script>alert('Username Password not valid. Please enter valid credential');
          window.location = '/login';</script>";
        }else{
            $req->session()->put("user",$user);
           // return redirect('/');
           echo "<script>alert('User Logged In Successfully');
           window.location = '/';</script>";
        }
    }


    public function register()
    {
        return view('register');
    }

    public function SaveUser(Request $req){
       // dd($req->all());
       $user = new User();
       $user->name = $req->name;
       $user->email = $req->email;
       $user->password = Hash::make($req->password);
       $user->save();
       echo "<script>alert('User Register Successfully');
       window.location = '/login';</script>";
      // return redirect('/login');
    }
}
