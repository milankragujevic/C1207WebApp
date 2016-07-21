<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    public function analyticable(){
        return $this->morphTo();
    }
}
