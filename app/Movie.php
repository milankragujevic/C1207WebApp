<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['name','slug','title','description','runtime',
    'imdb_code','imdb_vote','released','writer','country','language','rated',
        'trailer','award','type','quality','rating','created_by','updated_by','total_seasons'];
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function groups(){
        return $this->belongsToMany(Group::class);
    }
    public function directors(){
        return $this->belongsToMany(Director::class);
    }
    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    public function movielinks(){
        return $this->morphMany(Movielink::class, 'linkable');
    }
    public function genresmodel(){
        return $this->belongsToMany(Genre::class);
    }
    public function movieimages(){
        return $this->morphMany(Movieimage::class, 'imageable');
    }

    public function errors(){
        return $this->morphMany(Error::class,'errorable');
    }

    public function analytic(){
        return $this->morphOne(Analytics::class,'analyticable');
    }
}
