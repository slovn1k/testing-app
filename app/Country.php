<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    public function posts() {
        //this method will return the
        return $this->hasManyThrough('App\Post', 'App\User', 'id_user', 'id_user', 'id', 'id_user');
    }
}
