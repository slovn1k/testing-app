<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post() {
        //this will return the value from the database
        //id_user is the foreign key that in some cases we need to specify
        return $this->hasOne('App\Post', 'id_user');
    }

    //thi is the one to many relationship function
    public function posts() {
        return $this->hasMany('App\Post', 'id_user');
    }

    //this is the many to many relationship
    //and we indicate the table to with it is connecting
    public function roles() {
        //withPivot gives us the possibility to get data from the pivot table, witch in our situation is user_role
        return $this->belongsToMany('App\Role', 'user_role')->withPivot('created_at');
    }

    //this is a polymorphic function that morph to many table without having and foreign key
    public function photoes() {
        return $this->morphMany('App\Photo', 'imageable', 'imageable_type', 'imegable_id');
    }
}
