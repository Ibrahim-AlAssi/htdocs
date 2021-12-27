<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\prodectcontroller;
use App\Http\Controllers\Slidercontroller;
use App\Http\Controllers\Contactscontroller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\apicontroller;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//login
Route::group(['middleware' => ['auth']] , function() {
    Route::get('/cartlist', [apicontroller::class, 'cartlist']);
    Route::post('/addtocart', [apicontroller::class, 'addtocart']);


});

Route::post('/register', [apicontroller::class, 'register']);
Route::post('/login', [apicontroller::class, 'login']);
Route::get('/home', [apicontroller::class, 'home']);
Route::get('/productsview', [apicontroller::class, 'productsview']);
Route::get('/productsdetail/{id}', [apicontroller::class, 'Productsdetail']);
Route::get('/search/{name}', [apicontroller::class, 'search']);


               