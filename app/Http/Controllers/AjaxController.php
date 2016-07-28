<?php

namespace App\Http\Controllers;

use App\Group;
use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{

    public function showMovie($id)
    {
        $movie = Movie::find($id);
        return $movie;
    }

    public function feature()
    {
        $movie = Group::whereGroupName('Recommend')->first()->movies()->orderBy('updated_at', 'desc')->take(12)->get();
        foreach ($movie as $item) {
            $item->setVisible(['slug', 'poster', 'name', 'rating']);
        }
        return $movie;
    }

    public function topViewToday()
    {
        $movies = Movie::all()->sortByDesc('view_today')->take(12);
        return $movies;
    }

    public function topViewMonth()
    {
        $movies =Movie::all()->sortByDesc('view_month')->take(12);
        return $movies;
    }

    public function topRate()
    {
        $movies=Movie::orderBy('rating')->take(12)->get();
        return $movies;
    }

    public function search($name)
    {
        $movie = Movie::where('name', 'like', '%' . $name . '%')->take(6)->get();
        foreach ($movie as $item) {
            $item->setVisible([
                'slug', 'name', 'rating', 'poster'
            ]);
        }
        return $movie;
    }
}
