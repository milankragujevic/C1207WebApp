<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $fillable=['id','movie_id','link','option'];
    public $timestamps=false;
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
