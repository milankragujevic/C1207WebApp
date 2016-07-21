<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movielink extends Model
{
    protected $fillable=['provider','link'];
    protected $touches=['linkable'];
    public function linkable(){
        return $this->morphTo();
    }
}
