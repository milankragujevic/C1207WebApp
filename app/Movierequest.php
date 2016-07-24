<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movierequest extends Model
{
    protected $fillable=['name','email','message','status','imdb'];
}
