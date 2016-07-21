<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    public function errorable(){
        return $this->morphTo();
    }
}
