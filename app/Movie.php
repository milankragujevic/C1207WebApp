<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $appends = ['view', 'view_today', 'view_month', 'view_week'];
    protected $fillable = ['name', 'slug', 'title', 'description', 'runtime', 'poster',
        'imdb_code', 'imdb_vote', 'released', 'writer', 'country', 'language', 'rated',
        'trailer', 'award', 'type', 'quality', 'rating', 'created_by', 'updated_by', 'total_seasons'];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function movielinks()
    {
        return $this->morphMany(Movielink::class, 'linkable');
    }

    public function genresmodel()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function movieimages()
    {
        return $this->morphMany(Movieimage::class, 'imageable');
    }

    public function errors()
    {
        return $this->morphMany(Error::class, 'errorable');
    }

    public function analytics()
    {
        return $this->morphMany(Analytic::class, 'analyticable');
    }

    public function banner()
    {
        $this->hasOne(Banner::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getViewAttribute()
    {
        $view = $this->analytics()->count();
        return $view;
    }

    public function getViewTodayAttribute()
    {
        $view = $this->analytics()->whereBetween('created_at', array(Carbon::today(), Carbon::tomorrow()))->count();
        return $view;
    }

    public function getViewMonthAttribute()
    {
        $view = $this->analytics()->whereBetween('created_at', [Carbon::tomorrow()->subMonth(), Carbon::tomorrow()])->count();
        return $view;
    }

    public function getViewWeekAttribute()
    {
        $view = $this->analytics()->whereBetween('created_at', [Carbon::tomorrow()->subWeek(), Carbon::tomorrow()])->count();
        return $view;
    }

    public function renderStar()
    {
        if($this->rating==0){
            return '<i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>';
        }else if ($this->rating <= 2) {
            return '<i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>';
        } else if ($this->rating <= 4) {
            return '<i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>';
        } else if ($this->rating <= 6) {
            return '<i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>';
        } else if($this->rating<=8) {
            return '<i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>';
        }else{
            return '<i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>';
        }
    }}
