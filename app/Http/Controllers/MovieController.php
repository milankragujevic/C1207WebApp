<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class MovieController extends Controller
{


    public function show($slug)
    {
        $movie=Movie::whereSlug($slug)->first();
        return view('movie_detail')->with('movie',$movie);
    }

    public function play($slug,$epislug){
        $movie=Movie::whereSlug($slug)->first();
    }
}
