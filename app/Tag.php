<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['tag_content'];
    public function movies(){
        return $this->morphedByMany(Movie::class,'taggable');
    }
    public function episodes(){
        return $this->morphedByMany(Episode::class,'taggable');
    }
}
