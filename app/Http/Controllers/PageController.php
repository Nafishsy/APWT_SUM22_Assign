<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Validation\Rules\Password;

class PageController extends Controller
{
    function home()
    {
        session()->forget('c_id');
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
                'password' => [Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()],
                "conf_password"=>"same:password"
            ],
        
            [
                "required"=>"Please provide fill this field",
                "name.max"=>"Name should not exceed 10 characters",
                'conf_password.same'=> "Password & confirm password does not match",
                'password' => 'hmm'
                
            ]);
            $user = new account();
            $user->name = $req->name;
            $user->email =$req->email;
            $user->password =$req->password;
            $user->save();
            
        return redirect('/');
        
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
            
            $users = account::all();
            $crUser = account::where('email','=',$req->email)->first();
            session(['c_id' => $crUser->id]); 
            
        if ($crUser->type=='Admin') {
            return view('Admin.dashboard')->with('users',$users);
        } else {
            return view('User.dashboard')->with('users',$users);
        }
        
        

        
    }

    function details($id)
    {
        $user = account::where('id','=',$id)->first(); 
        
       return view('user.userDetails') -> with('user',$user);
    }

    function dashboard()
    {
        
        $users = account::all();   
             
        return view('User.dashboard')->with('users',$users);
    }
}
