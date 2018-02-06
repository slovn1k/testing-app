<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//here we are importing new library for using soft deletes that will contain deleted records in a special trash
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    //here we are using SoftDeletes
    use SoftDeletes;

    //here we are using build in variable dates for letting accessing the deleted timestamp
    protected $dates = ['deleted_at'];

    //this property fillable gives the permission to write data to the database
    //in this property we create an array with the fields that we give permission to create
    protected $fillable = [
        'title',
        'content'
    ];

    public function user() {
        //this will return the value from the database
        //id is the foreign key that in some cases we need to specify
        return $this->belongsTo('App\User', 'id');
    }
}


