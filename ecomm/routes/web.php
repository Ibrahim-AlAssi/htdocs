<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\prodectcontroller;
use App\Http\Controllers\Slidercontroller;
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

    Route::get('/myaccount', function () {
        return view('myaccount');
    });

    Route::get('/contact', function () {
        return view('contacts');
    });

    Route::post("cart",[prodectcontroller::class,'addtocart']);
    Route::get("carts",[prodectcontroller::class,'cartList']);
    Route::get("removecart-{id}",[prodectcontroller::class,'removeCart']); 
    Route::get("myorder",[prodectcontroller::class,'myOrder']);
    Route::post("/postcontacts",[prodectcontroller::class,'postcontacts']);
    Route::post("/orderPlace",[prodectcontroller::class,'orderPlace']);

    


 });
 
 Route::group([ 'middleware' => ['auth','role:admin']], function() {
   
    Route::get('/indexadmin', function () {
        return view('indexadmin');
    });

    Route::get("/slideradmin",[SliderController::class,'slideradmin']);
    Route::get("/removeimage-{id}",[SliderController::class,'removeimage']);
    Route::post("/addimage",[SliderController::class,'replaceimage']);
    Route::post("/imagnew",[SliderController::class,'imagnew']);
    Route::get("/adminprodect",[prodectcontroller::class,'adminprodect']);
    Route::post("/editproduct",[prodectcontroller::class,'editproduct']);
    Route::get("/removeproduct-{id}",[prodectcontroller::class,'removeproduct']);
    Route::post("/addproduct",[prodectcontroller::class,'addproduct']);
    Route::get("/admincontacts",[prodectcontroller::class,'admincontacts']);
    Route::get("/adminorder",[prodectcontroller::class,'orderlist']);
    Route::post("/adminconfrim-{id}",[prodectcontroller::class,'confrim']);
    Route::get("/adminhistory",[prodectcontroller::class,'orderhistory']);
    
    
    

});
//new router for new website










//new 

Route::get("/",[prodectcontroller::class,'index']);

Route::get("gridview",[prodectcontroller::class,'gridview']);
Route::get("/list-view",[prodectcontroller::class,'listview']);
Route::get("/prodectdetails-{id}",[prodectcontroller::class,'prodectdetail']);


Route::get('/login', function () {
    return view('login');
   
});
Route::get("search",[prodectcontroller::class,'search']);


//end



//Route::get("/",[prodectcontroller::class,'index']);










require __DIR__.'/auth.php';
