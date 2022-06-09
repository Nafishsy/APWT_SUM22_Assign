<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class PageController extends Controller
{
    function home()
    {
        return view('Page.home');
    }

    function register()
    {
        return view('Page.register');
    }
    
    function createSubmit(Request $req){
        
        $this->validate($req,
            [
                "name"=>"required|max:20|min:5",
                "email"=>"required|email|unique:users,email",
                "password"=>"required|min:8",
                "conf_password"=>"required|min:8|same:password"
            ],
        
            [
                "required"=>"Please provide fill this field",
                "name.max"=>"Name should not exceed 10 characters",
                'conf_password.same'=> "Password & confirm password does not match"
                
            ]);
            $user = new account();
            $user->name = $req->name;
            $user->email =$req->email;
            $user->password =$req->password;
            $user->save();
            
        return view('Page.login');
        
    }

    function login()
    {
        return view('Page.login');
    }

    function loginSubmit(Request $req){
        $this->validate($req,
            [

                "email"=>"required|exists:users,email",
                "password"=>"required|exists:users,password",

            ],
        
            [
                'email.exists'=>'No account is found using this mail',
                'password.exists'=>'No account is found using this password'
                
            ]);
           /* $st = new Student();
            $st->name = $req->name;
            $st->email =$req->email;
            $st->dob = $req->dob;
            $st->save();*/
            
            $user = account::where('email','=',$req->email)->first();   
             
        return view('user.dashboard')->with('user',$user);
        
    }

    /*function dashboard()
    {
        view('user.dashboard')
    }
    */
    function details($id)
    {
        $user = DB::table('users')->where('name', 'John')->first();
        
       return vieww('user.detials');// -> with('user',$user);
    }
}
