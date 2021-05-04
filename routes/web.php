<?php

use Illuminate\Support\Facades\Route;


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

    //Read all the Posts
    Route::get('/post','TankerController@index');

    //Create a new post
    Route::get('/post/create','TankerController@create'); //View
    Route::post('/post','TankerController@store'); //Logical Part

    //Edit a POST
    Route::get('/post/{id}/edit','TankerController@edit'); //View
    Route::post('/post/{id}','TankerController@update'); //Logical Part

    //Show individual data
    Route::get('/post/{id}','TankerController@show');

    //Delete an indicidual post
    Route::delete('/post/{id}','TankerController@destroy');

     //Read all the Posts
     Route::get('/userstable','UserController@index');

     //Create a new post
     Route::get('/userstable/create','UserController@create'); //View
     Route::post('/userstable','UserController@store'); //Logical Part
 
     //Edit a POST
     Route::get('/userstable/{id}/edit','UserController@edit'); //View
     Route::post('/userstable/{id}','UserController@update'); //Logical Part
 
     //Show individual data
     Route::get('/userstable/{id}','UserController@show');
 
     //Delete an indicidual post
     Route::delete('/userstable/{id}','UserController@destroy');
   

      //Read all the Posts
      Route::get('/slider','CarouselController@index');

      //Create a new post
      Route::get('/slider/create','CarouselController@create'); //View
      Route::post('/slider','CarouselController@store'); //Logical Part
  
      //Edit a POST
      Route::get('/slider/{id}/edit','CarouselController@edit'); //View
      Route::post('/slider/{id}','CarouselController@update'); //Logical Part
  
      //Show individual data
      Route::get('/slider/{id}','CarouselController@show');
  
      //Delete an indicidual post
      Route::delete('/slider/{id}','CarouselController@destroy');


      Route::get('/admin','FrontendController@dashboard');
      Route::get('/profile','FrontendController@profile');
      Route::get('/userstable','FrontendController@usersTable');
      Route::get('/carousel','FrontendController@carousel');
      Route::get('/tanker','FrontendController@Tanker');
});

