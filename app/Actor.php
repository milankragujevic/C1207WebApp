<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable=['name','description','avatar'];
    public $timestamps=false;
    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
