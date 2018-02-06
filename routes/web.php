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

//here we are using the functionality from the Post model
use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/about', function () {
  //  return "Welcome to about page";
//});

//Route::get('/contact', function () {
  //  return "This is the contact page, get all our contacts";
//});

//we can use multiple parameters if we wan to
//Route::get('/post/{id}', function ($id){ //here we are using route with parameters, and the parameter
                                         //in cached in the function
  //  return "This is post number ".$id; //here we concatenate the id with the returning result
//});

//here we are using a array value to assign long route
//Route::get('admin/posts/secret', array('as'=>'admin.secret', function() {
  //  $url = route('admin.secret'); //here we are using help function route to assign the value of the array value to an variable
    //return 'this url is '.$url;
//}));

//here we are returning a controller in a route, and passing a variable to the controller
//Route::get('/created/{id}', 'PostController2@index');


//here we are creating the resources from the methods that we have in the controller
//and now we can acces those methods as routes in the address bar of the browser
//Route::resource('resources', 'PostController2');


//here we are passing a variable to the view contact
//Route::get('/contacts/{name}/{surname}', 'PostController2@contact');

//here we are working with a specific blade file
//Route::get('/custom/{name}/{surname}', 'PostController2@custom');


//here we are using a custom people route for display a list of people using blade foreach
//Route::get('/people', 'PostController2@people');


//SQL Query using routes

Route::get('/insert', function() {
   //this code will execute an insert query into the database
   DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel','Laravel is the best PHP framework']);
});


//here we are reading and showing the results from database
Route::get('/read', function() {
   $result = DB::select('select *from posts');

   foreach ($result as $value){
       return $value->title;
   }
});


//this code bellow will update the value from database
Route::get('/update', function() {
   $update = DB::update('update posts set title = "Updated title" where id = ?', [1]);

   return $update;
});

Route::get('/delete', function() {
   $delete = DB::delete('delete from posts where id = ?', [1]);

   return $delete;
});

//ELOQUENT

Route::get('/find', function() {
   //here we are calling the all method from the post Model that will return all the values from the Post table
   $posts = Post::all();

   //here we are looping throw the result ad returning the value
   foreach ($posts as $post){
       return $post;
   }
});

Route::get('/findwhere', function() {
   //here we are using where method from the Post Model, then we are ordering it by id descending after that we are taking just one result and we get it
   $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

   return $posts;
});

Route::get('/findorfail', function (){
   //method findorfail will execute a search method and if the result is not found then it will show a message on the screen that the searching page is not found
   //is another case it will just show the founded result
//   $find = Post::findOrFail(1);

   //this method will find the firstorfail record if the where statement is true
   $find = Post::where('id', '<', 3)->firstOrFail();

   return $find;
});

Route::get('/basicinsert', function() {

    //here we are inserting a new value in the table using eloquent orm
    //first we declare a variable of type Post
//    $post = new Post();

    //in this case the method will find a post with this id and update it if it exists
    $post = Post::find(2);
    //here we attribute to the title a value
    $post->title = 'New title2';

    //here we attribute to the content a value
    $post->content = "New content2";

    //and here we save all the attributions to the database
    $post->save();

});

Route::get('/createmethod', function() {

    //here we use create method to create a eloquent query for inserting data to the database
    //!!!Important is that we must give access to the variables in the Post model for making changes in the database because they are protected by the the system
    Post::create(['title'=>'Created title', 'content'=>'Created content']);

});

Route::get('/updateeloq', function() {
    //here we are using two where statement like in the mysql database when we are using && operator
    //in this case we are updating the column where the statement are true and we are updating the title and the content of that column
    Post::where('id',8)->where('title', 'Created title')->update(['title'=>'Updated title', 'content'=>'Updated content by eloquent']);
});

Route::get('/delete', function() {
   //the code bellow will find post with id 8 and delete it using method delete
   $post = Post::find(8);
   $post->delete();
});

Route::get('/delete2', function() {
    //here we are deleting multiple record by using an array inside destroy method
    Post::destroy([2,3,4,5,6,7,9]);
});

Route::get('/deleted_at/{id}', function ($id){
   Post::find($id)->delete();
});

Route::get('/deleted_records', function (){
   //the method bellow will find the columns that where soft deleted and show them
   $post_deleted = Post::withTrashed()->where('id', 14)->get();

   return $post_deleted;
});

Route::get('/only_deleted', function() {
   //here we are going to get only soft deleted items and return them on the page
   $only_trashed = Post::onlyTrashed()->where('is_admin', 0)->get();

   return $only_trashed;
});

Route::get('/restore', function() {
   //this code bellow will restore all soft deleted items in the table(remove the timestamp from the deleted_at column)
   Post::withTrashed()->where('is_admin', 0)->restore();
});

Route::get('/humiliate', function() {
   //force delete method will delete permanently data from database
   Post::onlyTrashed()->where('is_admin', 0)->forcedelete();
});



//Database Relationships
Route::get('/user/{id}/post', function($id) {
   //this is one to one relationship
   //here we are getting data from the User model with Post model
   //and we are specifying the wanted data to be selected
   return User::find($id)->post->content;
});

//this is the reverse relationship for the above route
Route::get('/post/{id}/user', function($id) {
   return Post::find($id)->user->name;
});

//this is the one to many relationship
//it just return multiple values from the database
Route::get('/multiple', function() {
   $user = User::find(1);

   foreach ($user->posts as $post){
       echo $post->title."<br>";
   }
});

//here we are using many to many relationship
//because here we have multiple tables related
Route::get('/many_users/{id}/role', function($id) {
//   $users = User::find($id);
//
//   foreach ($users->roles as $role){
//       echo $role->name."<br>";
//   }

    $users = User::find($id)->orderBy('id', 'desc')->get();

    echo $users."<br>";
});