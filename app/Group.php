<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps=false;
    protected $fillable=['group_name'];
    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
