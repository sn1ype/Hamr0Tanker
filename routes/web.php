<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\TankerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CarouselController;
Use App\Http\Controllers\FrontEndController;
Use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->group(function () 
{
   

    Route::get('/','FrontendController@index');
      Route::get('/user','FrontendController@User');
      Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
      Route::get('/tanker/{id}', 'TankerController@ViewProduct');
      Route::get('/order/{id}','OrderController@OrderTanker');
      Route::get('/error','FrontendController@Error');
      Route::get('/confirmorder/{id}','OrderController@ConfirmOrder');
      Route::get('/profile','FrontendController@profile');
      Route::get('/myorders','FrontendController@MyOrder');
      Route::post('/myorders/{tanker_id}','OrderController@store');
      Route::delete('/cancelorder/{id}','OrderController@destroy');
      Route::get('/testimonial','TestimonyController@createsecond');
      Route::post('/product','TestimonyController@storesecond');
      
      
    
});


Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('/',[FrontendController::class, 'dashboard']);
    Route::group(['prefix'=>'carousel','middleware'=>'auth'],function (){
        
        Route::get('/',[CarouselController::class, 'index']);
        Route::get('/create',[CarouselController::class, 'create']);
        Route::post('/',[CarouselController::class, 'store']);
        Route::get('/{id}/edit',[CarouselController::class, 'edit']);
        Route::post('/{id}',[CarouselController::class, 'update']);
        Route::delete('/{id}',[CarouselController::class, 'destroy']);
    });

    Route::group(['prefix'=>'tanker','middleware'=>'auth'],function (){
        Route::get('/',[TankerController::class, 'index']);
        Route::get('/create',[TankerController::class, 'create']);
        Route::post('/',[TankerController::class, 'store']);
        Route::get('/{id}/edit',[TankerController::class, 'edit']);
        Route::post('/{id}',[TankerController::class, 'update']);
        Route::delete('/{id}',[TankerController::class, 'destroy']);
    });

    Route::group(['prefix'=>'userstable','middleware'=>'auth'],function (){
        Route::get('/',[UserController::class, 'index']);
        Route::get('/create',[UserController::class, 'create']);
        Route::post('/',[UserController::class, 'store']);
        Route::get('/{id}/edit',[UserController::class, 'edit']);
        Route::post('/{id}',[UserController::class, 'update']);
        Route::delete('/{id}',[UserController::class, 'destroy']);
    });


    Route::group(['prefix'=>'orders','middleware'=>'auth'],function (){
        Route::get('/',[OrderController::class, 'Orders']);
        Route::get('/ordersarchive',[OrderController::class, 'OrdersArchive']);
        Route::get('/orderleft/{id}',[OrderController::class, 'ChangeOrderStatus']);
        Route::get('/orderdelivered/{id}',[OrderController::class, 'OrderDelivered']);
        Route::get('/closeorder/{tanker_id}',[OrderController::class, 'OrderClosed']);
        Route::delete('/ordercanceled/{id}',[OrderController::class, 'OrderCanceled']);
        
    
    });
    Route::group(['prefix'=>'testimony','middleware'=>'auth'],function (){
        Route::get('/',[TestimonyController::class, 'index']);
        Route::get('/create',[TestimonyController::class, 'create']);
        Route::post('/',[TestimonyController::class, 'store']);
        Route::get('/{id}/edit',[TestimonyController::class, 'edit']);
        Route::post('/{id}',[TestimonyController::class, 'update']);

    });
});
