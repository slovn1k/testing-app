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

//we can use multiple parameters if we wan to
Route::get('/post/{id}', function ($id){ //here we are using route with parameters, and the parameter
                                         //in cached in the function
    return "This is post number ".$id; //here we concatenate the id with the returning result
});

//here we are using a array value to assign long route
Route::get('admin/posts/secret', array('as'=>'admin.secret', function() {
    $url = route('admin.secret'); //here we are using help function route to assign the value of the array value to an variable
    return 'this url is '.$url;
}));

//here we are returning a controller in a route, and passing a variable to the controller
Route::get('/created/{id}', 'PostController2@index');


//here we are creating the resources from the methods that we have in the controller
//and now we can acces those methods as routes in the address bar of the browser
Route::resource('resources', 'PostController2');


//here we are passing a variable to the view contact
Route::get('/contacts/{name}/{surname}', 'PostController2@contact');

//here we are working with a specific blade file
Route::get('/custom/{name}/{surname}', 'PostController2@custom');


//here we are using a custom people route for display a list of people using blade foreach
Route::get('/people', 'PostController2@people');