<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\eco1;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\hash;

class Eco1Controller extends Controller
{
    //
    function login(Request $req){
       // return $req->input();
       $user=  eco1::where(['email'=>$req->email])->first();
       if(!$user ||!Hash::check($req->password,$user->password)){
            return"email or password not match";
       }
       else{
           
           
           $req->session()->put('user',$user);
           return redirect('/');
           
       }

       
        
         

    }
    function SignUp(Request $req){
        $user= new eco1;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login');

    }
}
