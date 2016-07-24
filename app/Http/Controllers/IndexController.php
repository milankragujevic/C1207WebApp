<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Group;
use App\Movie;
use App\Movierequest;
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
        //$banner=Banner::take(6)->get();
        $banner='';
        return view('index',compact('latestMovies','latestSeries','banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestmovie()
    {
        $title='Latest Movie';
        $listMovie=Movie::whereType('movie')->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }

    public function latestseries()
    {
        $title='Latest Series';
        $listMovie=Movie::whereType('series')->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }

    public function recommend(){
        $movie=Movie::take(12)->get();
        return $movie;
    }

    public function createRequest(){
        return view('movie_request');
    }

    public function storeRequest(Request $request){
        Movierequest::create([
            'name'=>$request->input('name'),
            'name'=>$request->input('imdb'),
            'name'=>$request->input('email'),
            'message'=>$request->input('message'),
            'status'=>0,
        ]);
        return back();
    }

}
