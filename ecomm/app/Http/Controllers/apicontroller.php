<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\prodect;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\cart;

class apicontroller extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole('user');
        event(new Registered($user));

        Auth::login($user);
         
          $token = $user->createToken('my-app-token')->plainTextToken;
        $responsee = [
            'user' => $user,
            'token' => $token
        ];
        return response($responsee, 201);
    }

    public function login(LoginRequest $request)
    {   $user= User::where('email',$request->email)->first();
        $request->authenticate();
        $request->session()->regenerate();
        $request->session()->put('user');
        

        $token = $user->createToken('my-app-token')->plainTextToken;

        $responsee = [
            'user' => $user,
            'token' => $token
        ];
        return response($responsee, 201);
    }
    function home()
    {
        // $user = Auth::user();
      
         $slider = Slider::all();
        // if ($user && $user->hasRole('owner|admin')) {
        //    return view("indexadmin");
        // }
    
      $newprodect1 = prodect::orderByDesc("created_at")->take(8)->get();
      $newprodect2 = $newprodect1->reverse()->take(4);
      $newprodect3 = $newprodect1->take(4);
      $random =prodect::inRandomOrder()->limit(3)->get();
      $random1 =prodect::inRandomOrder()->limit(3)->get();
     
     
     
      
     
    

    $responsee = [
        'slider' => $slider,
        'new_products' => $newprodect1,
        'random' => $random,
        'random1' => $random1
        
    ];
    return response($responsee, 201);
    }

    function productsview()
    {
        $Prodect = prodect::paginate(10);
        $responsee = [
            'Products' => $Prodect,
            
            
        ];
        return response($responsee, 201);
    }

    function Productsdetail($id)
    {
        $data = prodect::find($id);
        
        $responsee = [
            'Products' => $data,
            
            
        ];
        return response($responsee, 201);
    }

    function search($name)
    {
       // $data = prodect::where("name","like","%".$req."%")->get();
      // paginate(10);
        $data = prodect::where('name', 'like', '%' . $name . '%')->paginate(10);
        $responsee = [
            'search' => $data,        
        ];
        return response($responsee, 201);

    }

    public static function cartnumber()
    {
        $it = Auth::user('user')->id;

        $user_id = $it;
        $Cart = new cart;
        return $Cart::where('eco1s_id', $user_id)->count();
    }

    function cartlist()
    {
        $it = Auth::user('user')->id;

        $userId = $it;
        
        
        $carts2= cart::with("product")
        ->where('cart.eco1s_id', $userId)->sum('cart.totalprice');;
       $carts=user()->carts()->with("product")->get();
        return view('carts', ['Products_Inside_Cart' => $carts],['totalprice' => $carts2]);


    }

    function addtocart(Request $req)
    {
       
        $it = Auth::user('user')->id;
        $check= cart::where('cart.eco1s_id',$it)->where('cart.prodect_id',$req->prodect_id)->first();
       
        // if user login
    
      
          
        if ($check==null) {
            $Cart = new cart;
            $Cart->eco1s_id = $it;
            $Cart->quantity = $req->quantity;
            $Cart->totalprice=$req->totalprice;
            $Cart->prodect_id = $req->prodect_id;
            $Cart->save();
            return ('datasaved');
        } else {
            
            $check->quantity = $check->quantity+$req->quantity;
            $check->totalprice=$check->totalprice+$req->totalprice;
            $check->save();
            return ('datasaved');
        }



}




}