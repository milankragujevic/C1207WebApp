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
        $recommend=Group::whereGroupName('Recommend')->first()->movies()->orderBy('updated_at','decs')->take(12)->get();
        $banners=Banner::whereMovieId(1)->get();
        return view('index',compact('latestMovies','latestSeries','banners','recommend'));
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
            'imdb'=>$request->input('imdb'),
            'email'=>$request->input('email'),
            'message'=>$request->input('message'),
            'status'=>0,
        ]);
        return back();
    }

}
