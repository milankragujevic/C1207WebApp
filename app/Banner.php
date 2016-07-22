<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $fillable=['id','movie_id','link'];
    public $timestamps=false;
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
