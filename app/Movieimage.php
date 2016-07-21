<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movieimage extends Model
{
    public $timestamps=false;
    protected $fillable=['link','type'];
    protected $touches=['imageable'];

    public function imageable(){
        return $this->morphTo();
    }
}
