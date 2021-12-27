<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\prodect;
use App\Models\cart;
use App\Models\Contacts;
use App\Models\orders;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Break_;
use Illuminate\Support\Str;

class  prodectcontroller extends Controller
{

    //
    // function index()
    // {
    //    // $user = Auth::user();
    //   // $user && $user->hasRole('owner|admin')
    //     //$admin='Admin';
    //     //$sureadmin= Auth::user()->roles->first()->display_name;
    //     $Prodect = prodect::all();
    //     if (user() && user()->hasRole('owner|admin')) {
    //         return view("home", compact('Prodect'));
    //     }

    //     return view("prodect", compact('Prodect'));
    // }


    function index()
    {
        $user = Auth::user();
      
        $slider = Slider::all();
        if ($user && $user->hasRole('owner|admin')) {
           return view("indexadmin");
        }
    
      $newprodect1 = prodect::orderByDesc("created_at")->take(8)->get();
      $newprodect2 = $newprodect1->reverse()->take(4);
      $newprodect3 = $newprodect1->take(4);
      $random =prodect::inRandomOrder()->limit(3)->get();
      $random1 =prodect::inRandomOrder()->limit(3)->get();
     
     
     
      
     
    return view("index", compact('slider', 'newprodect3','newprodect2','random','random1'));
    }

    function listview()
    {
        $Prodect = prodect::paginate(10);
         return view("list-view", compact('Prodect'));


    }

    function gridview()
    {
        $Prodect = prodect::paginate(12);
         return view("gridview", compact('Prodect'));


    }

    function prodectdetail($id)
    {
        $data = prodect::find($id);
        
        return view("/prodectdetails", compact('data'));
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
            return redirect('/');
        } else {
            
            $check->quantity = $check->quantity+$req->quantity;
            $check->totalprice=$check->totalprice+$req->totalprice;
            $check->save();
            return redirect('/');
        }
    }

    function cartlist()
    {
            
       
         $it = Auth::user('user')->id;

         $userId = $it;
        // $totalprice = DB::table('cart')


        //     ->join('prodect', 'cart.prodect_id', '=', 'prodect.id')
        //     ->where('cart.eco1s_id', $userId)
        //    ->sum('prodect.price');
         
      //    $carts= cart::with("product");
     
        
        
      $carts2= cart::with("product")

            ->where('cart.eco1s_id', $userId)->sum('cart.totalprice');;
             //send prodect id to  return view
       $carts=user()->carts()->with("product")->get();
        return view('carts', ['prodect' => $carts],['prodects' => $carts2]);

    }
    

    function search(Request $req)
    {
       // $data = prodect::where("name","like","%".$req."%")->get();
        $data = prodect::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view("search", compact('data'));
    }

    function removecart($id)
    {
        cart::destroy($id);
        return redirect('/carts');
    }

    public static function cart()
    {
        $it = Auth::user('user')->id;

        $user_id = $it;
        $Cart = new cart;
        return $Cart::where('eco1s_id', $user_id)->count();
    }

    function orderPlace(Request $req)
    {
        $userId = Auth::user('user')->id;
        $allCart = Cart::where('eco1s_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new orders;
            $order->prodect_id = $cart['prodect_id'];
            $order->ecoms1_id = $cart['eco1s_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->totalprice = $cart['totalprice'];
            $order->quantity = $cart['quantity'];     
            $order->save();
            Cart::where('eco1s_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    function postcontacts(Request $req){
        $contacts= new Contacts;
        $contacts->user_id=$req->id;
        $contacts->title=$req->title;
        $contacts->subject=$req->subject;
        $contacts->save();
        return redirect('/');


    }

    function myOrder()
    { $userId = Auth::user('user')->id;
        $carts2= cart::with("product")

        ->where('cart.eco1s_id', $userId)->sum('cart.totalprice');;
        
       
        $orders = DB::table('order')
            ->join('prodect', 'order.prodect_id', '=', 'prodect.id')
            ->where('order.ecoms1_id', $userId)
            ->get();

        return view('myorder', ['orders' => $orders],['prodects' => $carts2]);
    }

    function adminprodect(Request $req)
    {   $Prodect = prodect::paginate(10);
        return view("/addproduct", compact('Prodect'));
        
    }
    function editproduct(Request $req){
        $input = $req->all();
        if ($req->hasFile('image')) {
            $imagepath = "public/images";
            $image = $req->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($imagepath, $imagename);
            $input['image'] = $imagename;
        }

        $pathimage = "/storage/images/$imagename";

        


        $Prodect = prodect::find($req->id);
        $Prodect->name=$req->name;
        $Prodect->price=$req->price;
        $Prodect->category=$req->category;
        $Prodect->description=$req->description;
        $Prodect->gallery = $pathimage;
        $Prodect->save();
        return redirect('/adminprodect');
    }

    function removeproduct($id){
        cart::where('prodect_id', $id)->delete();
        prodect::destroy($id);
        orders::where('product_id', $id)->delete();
        
        return redirect('/adminprodect');
    }
    function addproduct(Request $req){
        $input = $req->all();
        if ($req->hasFile('image')) {
            $imagepath = "public/images";
            $image = $req->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($imagepath, $imagename);
            $input['image'] = $imagename;
        }

        $pathimage = "/storage/images/$imagename";

        $ADDprodect = new prodect();
        $ADDprodect->name = $req->name;
        $ADDprodect->category = $req->category;
        $ADDprodect->price = $req->price;
        $ADDprodect->description = $req->description;
        $ADDprodect->gallery = $pathimage;
        $ADDprodect->save();
        return redirect('/adminprodect');

    }

    function admincontacts(){
    
        $contacts= Contacts::with("user")->orderByDesc("created_at")
        ->paginate(3);
      

        return view('/admincontacts', ['contacts' => $contacts]);
        
    }

    function orderlist()
    {
        $pending = 'pending';


        $orders= orders::with("product","user")
        ->where('order.status', $pending)
        ->paginate(10);
      //  $orders = DB::table('orders')
         //   ->join('prodect', 'orders.product_id', '=', 'prodect.id')
            // ->select('prodect.*','cart.id as cart_id')
        //    ->select('orders.*', 'orders.id as orders_id')
         //   ->where('orders.status', $pending)
          //  ->get();

        return view('adminorder', ['orders' => $orders]);
    }

    function orderhistory()
    {
        $pending = 'confrimed';



        $orders = orders::with("product","user")
            
            // ->select('prodect.*','cart.id as cart_id')
            
            ->where('order.status', $pending)
            ->paginate(10);

        return view('adminhistory', ['orders' => $orders]);
    }
    function confrim($id)
    {
        $order = orders::find($id);



        $order->status = "confrimed";
        $order->payment_status = "done";
        $order->save();
        return redirect('/adminorder');
    }

    



    function home()
    {
        // if(Auth::user()->hasRole('user')){
        //    $Prodect = prodect::all();

        //  return view("/prodect", compact('Prodect'));
        //}else{
        $Prodect = prodect::all();
        return view("/home", compact('Prodect'));
    }

    




   
    // function detail($id)
    // {
    //     $data = prodect::find($id);

    //     return view("detail", compact('data'));
    // }
    
    // function addtcart(Request $req)
    // {
    //     // if user login
    //     if (Auth::check()) {
    //         $it = Auth::user('user')->id;
    //         $Cart = new cart;
    //         $Cart->eco1s_id = $it;
    //         $Cart->prodect_id = $req->prodect_id;
    //         $Cart->save();
    //         return redirect('/');
    //     } else {
    //         return redirect('/login');
    //     }
    // }

   
   
  
   

    // function order()
    // {

    //     $userId = Auth::user('user')->id;
    //     $prodocts = DB::table('cart')


    //         ->join('prodect', 'cart.prodect_id', '=', 'prodect.id')
    //         ->where('cart.eco1s_id', $userId)
    //         ->sum('prodect.price');
    //     return view('/ordernow', ['prodect' => $prodocts]);
    // }
    // function orderPlace(Request $req)
    // {
    //     $userId = Auth::user('user')->id;
    //     $allCart = Cart::where('eco1s_id', $userId)->get();
    //     foreach ($allCart as $cart) {
    //         $order = new orders;
    //         $order->product_id = $cart['prodect_id'];
    //         $order->user_id = $cart['eco1s_id'];
    //         $order->status = "pending";
    //         $order->payment_method = $req->payment;
    //         $order->payment_status = "pending";
    //         $order->address = $req->address;
    //         $order->save();
    //         Cart::where('eco1s_id', $userId)->delete();
    //     }
    //     $req->input();
    //     return redirect('/');
    // }
    // function myOrders()
    // {
    //     $userId = Auth::user('user')->id;
    //     $orders = DB::table('orders')
    //         ->join('prodect', 'orders.product_id', '=', 'prodect.id')
    //         ->where('orders.user_id', $userId)
    //         ->get();

    //     return view('myorders', ['orders' => $orders]);
    // }


    // function addprodect(Request $req)
    // {
    //     $input = $req->all();
    //     if ($req->hasFile('image')) {
    //         $imagepath = "public/images";
    //         $image = $req->file('image');
    //         $imagename = $image->getClientOriginalName();
    //         $path = $req->file('image')->storeAs($imagepath, $imagename);
    //         $input['image'] = $imagename;
    //     }

    //     $pathimage = "/storage/images/$imagename";

    //     $ADDprodect = new prodect();
    //     $ADDprodect->name = $req->name;
    //     $ADDprodect->Category = $req->Category;
    //     $ADDprodect->Price = $req->Price;
    //     $ADDprodect->description = $req->DESCRIPTION;
    //     $ADDprodect->gallery = $pathimage;
    //     $ADDprodect->save();
    //     return redirect('/addprodect');
    // }

    // function prodectlist()
    // {
    //     $prodect = prodect::all();
    //     return view("prodectlist", compact('prodect'));
    // }
    // function removeprodect($id)
    // {

    //     $cartt = cart::where('prodect_id', '=', $id)->delete();
    //     prodect::destroy($id);


    //     return redirect('/prodectlist');
    // }
    // function editprodect($id)
    // {

    //     $data = prodect::find($id);

    //     return view("editprodect", compact('data'));
    // }
    // function editedprodect(Request $req)
    // {
    //     $input = $req->all();
    //     if ($req->hasFile('image')) {
    //         $imagepath = "public/images";
    //         $image = $req->file('image');
    //         $imagename = $image->getClientOriginalName();
    //         $path = $req->file('image')->storeAs($imagepath, $imagename);
    //         $input['image'] = $imagename;
    //     }
    //     $pathimage = "/storage/images/$imagename";
    //     $data = prodect::find($req->id);

    //     $data->id = $req->id;
    //     $data->name = $req->name;
    //     $data->Category = $req->Category;
    //     $data->Price = $req->Price;
    //     $data->description = $req->DESCRIPTION;
    //     $data->gallery = $pathimage;
    //     $data->save();
    //     return redirect('/prodectlist');
    // }

    // function orderlist()
    // {
    //     $pending = 'pending';


    //     $orders= orders::with("product","user")
    //     ->where('orders.status', $pending)
    //     ->get();
    //   //  $orders = DB::table('orders')
    //      //   ->join('prodect', 'orders.product_id', '=', 'prodect.id')
    //         // ->select('prodect.*','cart.id as cart_id')
    //     //    ->select('orders.*', 'orders.id as orders_id')
    //      //   ->where('orders.status', $pending)
    //       //  ->get();

    //     return view('adminorders', ['orders' => $orders]);
   // }
   
    // function orderhistory()
    // {
    //     $pending = 'confrimed';



    //     $orders = DB::table('orders')
    //         ->join('prodect', 'orders.product_id', '=', 'prodect.id')
    //         // ->select('prodect.*','cart.id as cart_id')
    //         ->select('orders.*', 'orders.id as orders_id')
    //         ->where('orders.status', $pending)
    //         ->get();

    //     return view('adminorders', ['orders' => $orders]);
    // }
}
