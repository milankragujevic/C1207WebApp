<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $touches = ['movie'];
    protected $fillable=['movie_id','imdb_code','name','slug','season','description',
    'rating','quality','released','poster','created_by','updated_by'];
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function movielinks(){
        return $this->morphMany(Movielink::class, 'linkable');
    }

    public function movieimages(){
        return $this->morphMany(Movieimage::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function errors(){
        return $this->morphMany(Error::class,'errorable');
    }
    public function analytics(){
        return $this->morphOne(Analytic::class,'analyticable');
    }
}
