<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\prodectcontroller;

use App\Http\Controllers\Contactscontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// only for login
Route::group(['middleware' => ['auth']] , function() {

Route::get("cartlist",[prodectcontroller::class,'cartList']); 
Route::get("removecart/{id}",[prodectcontroller::class,'removeCart']); 
Route::get("ordernow",[prodectcontroller::class,'order']); 
Route::post("orderPlace",[prodectcontroller::class,'orderPlace']);
Route::get("myorders",[prodectcontroller::class,'myOrders']);
Route::post("addtocart",[prodectcontroller::class,'addtcart']);
    
 
 });
 
 Route::group([ 'middleware' => ['auth','role:admin']], function() {
    Route::get('/addprodect', function () {
        return view('addprodect');
    });
    Route::get("/removeprodect/{id}",[prodectcontroller::class,'removeprodect']);
    Route::get("/prodectlist",[prodectcontroller::class,'prodectlist']);
    Route::post("addprodect",[prodectcontroller::class,'addprodect']);
    Route::get("/editprodect/{id}",[prodectcontroller::class,'editprodect']);
    Route::post("/editprodected",[prodectcontroller::class,'editedprodect']);
    Route::get("/home",[prodectcontroller::class,'home']);
    Route::get("/",[prodectcontroller::class,'indexadmin']);
    
Route::get("/adminorders",[prodectcontroller::class,'orderlist']);
Route::post("/adminconfrim/{id}",[prodectcontroller::class,'confrim']);
    
Route::get("/orderhistory",[prodectcontroller::class,'orderhistory']);
    
     
    
    
    

});
//new router for new website


Route::get('/headers', function () {
    return view('headers');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/myaccount', function () {
    return view('myaccount');
});
Route::get('/contact', function () {
    return view('contacts');
});

//new 

Route::get("/",[prodectcontroller::class,'index']);

Route::get("gridview",[prodectcontroller::class,'gridview']);
Route::get("/list-view",[prodectcontroller::class,'listview']);
Route::get("/prodectdetails-{id}",[prodectcontroller::class,'prodectdetail']);
Route::post("cart",[prodectcontroller::class,'addtocart']);
Route::get("carts",[prodectcontroller::class,'cartList']);
Route::get("removecart-{id}",[prodectcontroller::class,'removeCart']); 
Route::get("myorder",[prodectcontroller::class,'myOrder']);
Route::post("/postcontacts",[prodectcontroller::class,'postcontacts']);

 




Route::get('/login', function () {
    return view('login');
   
});


//end



//Route::get("/",[prodectcontroller::class,'index']);

Route::get("detail/{id}",[prodectcontroller::class,'detail']);
Route::get("search",[prodectcontroller::class,'search']);








require __DIR__.'/auth.php';
