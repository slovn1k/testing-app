<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    //the function bellow allows us to make polymorphic relations with other table without making two mysql likes
    public function imageable() {
        return $this->morphTo();
    }

}
