<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\prodect;
use App\Models\cart;
use App\Models\orders;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Break_;

class  prodectcontroller extends Controller
{

    //
    function index()
    {
       // $user = Auth::user();
      // $user && $user->hasRole('owner|admin')
        //$admin='Admin';
        //$sureadmin= Auth::user()->roles->first()->display_name;
        $Prodect = prodect::all();
        if (user() && user()->hasRole('owner|admin')) {
            return view("home", compact('Prodect'));
        }

        return view("prodect", compact('Prodect'));
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





    function image()
    {
        $Prodect = prodect::all();

        return view("image", compact('Prodect'));
    }
    function detail($id)
    {
        $data = prodect::find($id);

        return view("detail", compact('data'));
    }
    function search(Request $req)
    {

        $data = prodect::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view("search", compact('data'));
    }
    function addtocart(Request $req)
    {
        // if user login
        if (Auth::check()) {
            $it = Auth::user('user')->id;
            $Cart = new cart;
            $Cart->eco1s_id = $it;
            $Cart->prodect_id = $req->prodect_id;
            $Cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    public static function cart()
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
        $prodoct = DB::table('cart')


            ->join('prodect', 'cart.prodect_id', '=', 'prodect.id')
            ->where('cart.eco1s_id', $userId)
            //->select('prodect.*',) //send prodect id to  return view
            ->select('prodect.*', 'cart.id as cart_id') // send cart id to return view
            ->get();
        return view('cartlist', ['prodect' => $prodoct]);
    }
    function removecart($id)
    {
        cart::destroy($id);
        return redirect('/cartlist');
    }

    function order()
    {

        $userId = Auth::user('user')->id;
        $prodocts = DB::table('cart')


            ->join('prodect', 'cart.prodect_id', '=', 'prodect.id')
            ->where('cart.eco1s_id', $userId)
            ->sum('prodect.price');
        return view('/ordernow', ['prodect' => $prodocts]);
    }
    function orderPlace(Request $req)
    {
        $userId = Auth::user('user')->id;
        $allCart = Cart::where('eco1s_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new orders;
            $order->product_id = $cart['prodect_id'];
            $order->user_id = $cart['eco1s_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('eco1s_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    function myOrders()
    {
        $userId = Auth::user('user')->id;
        $orders = DB::table('orders')
            ->join('prodect', 'orders.product_id', '=', 'prodect.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('myorders', ['orders' => $orders]);
    }


    function addprodect(Request $req)
    {
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
        $ADDprodect->Category = $req->Category;
        $ADDprodect->Price = $req->Price;
        $ADDprodect->description = $req->DESCRIPTION;
        $ADDprodect->gallery = $pathimage;
        $ADDprodect->save();
        return redirect('/addprodect');
    }

    function prodectlist()
    {
        $prodect = prodect::all();
        return view("prodectlist", compact('prodect'));
    }
    function removeprodect($id)
    {

        $cartt = cart::where('prodect_id', '=', $id)->delete();
        prodect::destroy($id);


        return redirect('/prodectlist');
    }
    function editprodect($id)
    {

        $data = prodect::find($id);

        return view("editprodect", compact('data'));
    }
    function editedprodect(Request $req)
    {
        $input = $req->all();
        if ($req->hasFile('image')) {
            $imagepath = "public/images";
            $image = $req->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $req->file('image')->storeAs($imagepath, $imagename);
            $input['image'] = $imagename;
        }
        $pathimage = "/storage/images/$imagename";
        $data = prodect::find($req->id);

        $data->id = $req->id;
        $data->name = $req->name;
        $data->Category = $req->Category;
        $data->Price = $req->Price;
        $data->description = $req->DESCRIPTION;
        $data->gallery = $pathimage;
        $data->save();
        return redirect('/prodectlist');
    }

    function orderlist()
    {
        $pending = 'pending';


        $orders= orders::with("product","user")
        ->where('orders.status', $pending)
        ->get();
      //  $orders = DB::table('orders')
         //   ->join('prodect', 'orders.product_id', '=', 'prodect.id')
            // ->select('prodect.*','cart.id as cart_id')
        //    ->select('orders.*', 'orders.id as orders_id')
         //   ->where('orders.status', $pending)
          //  ->get();

        return view('adminorders', ['orders' => $orders]);
    }
    function confrim($id)
    {
        $order = orders::find($id);



        $order->status = "confrimed";
        $order->payment_status = "done";
        $order->save();
        return redirect('/adminorders');
    }
    function orderhistory()
    {
        $pending = 'confrimed';



        $orders = DB::table('orders')
            ->join('prodect', 'orders.product_id', '=', 'prodect.id')
            // ->select('prodect.*','cart.id as cart_id')
            ->select('orders.*', 'orders.id as orders_id')
            ->where('orders.status', $pending)
            ->get();

        return view('adminorders', ['orders' => $orders]);
    }
}
