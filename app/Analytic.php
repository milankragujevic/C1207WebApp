<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $fillable=['view_count'];
    public function analyticable(){
        return $this->morphTo();
    }
}
