<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "Welcome to about page";
});

Route::get('/contact', function () {
    return "This is the contact page, get all our contacts";
});

Route::get('/post/{id}', function ($id){ //here we are using route with parameters, and the parameter
                                         //in cached in the function



});
