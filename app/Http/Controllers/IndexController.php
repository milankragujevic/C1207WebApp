<?php

namespace App\Http\Controllers;

use App\Group;
use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestMovies= Movie::whereType('movie')->orderBy('updated_at','desc')->take(12)->get();
        $latestSeries=Movie::whereType('series')->orderBy('updated_at','desc')->take(12)->get();
        return view('index',compact('latestMovies','latestSeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestmovie()
    {
        $title='Latest Movie';
        $latestMovie=Movie::whereType('movie')->orderBy('updated_at','desc')->paginate(20);
        return view('movie_list',compact('title','latestMovie'));
    }

    public function latestseries()
    {
        $title='Latest Series';
        $latestMovie=Movie::whereType('series')->orderBy('updated_at','desc')->paginate(20);
        return view('movie_list',compact('title','latestMovie'));
    }


}
