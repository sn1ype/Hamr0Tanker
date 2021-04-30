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

Route::get('/','FrontendController@index');
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
     Route::get('/user','UserController@index');

     //Create a new post
     Route::get('/user/create','UserController@create'); //View
     Route::post('/user','UserController@store'); //Logical Part
 
     //Edit a POST
     Route::get('/user/{id}/edit','UserController@edit'); //View
     Route::post('/user/{id}','UserController@update'); //Logical Part
 
     //Show individual data
     Route::get('/user/{id}','UserController@show');
 
     //Delete an indicidual post
     Route::delete('/user/{id}','UserController@destroy');

});

