<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Group;
use App\Movie;
use App\Movierequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App;
use App\Actor;
use App\Director;
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
        $title='Latest';
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
    public function sitemap(){
      $Sitemap=App::make('sitemap');
      $Sitemap->add(url('/'),Carbon::now(),'1.0','always');
      $Sitemap->add(url('/latestmovie'),Carbon::now(),'0.9','always');
      $Sitemap->add(url('/latestseries'),Carbon::now(),'0.9','always');
      $Sitemap->add(url('/cinema'),Carbon::now(),'0.9','always');
      $Sitemap->add(url('/hot'),Carbon::now(),'0.9','always');
      $Sitemap->add(url('/topimdb'),Carbon::now(),'0.9','always');
      $Sitemap->add(url('/latestmovie'),Carbon::now(),'0.9','always');

      $movieList=Movie::select('slug','updated_at')->get();
      foreach ($movieList as $item) {
        $Sitemap->add(url('/movie/'.$item->slug),$item->updated_at,'0.8','monthly');
        $Sitemap->add(url('/play/'.$item->slug),$item->updated_at,'0.8','daily');
      }
      $starList=Actor::select('name')->get();
      foreach ($starList as $item) {
        $Sitemap->add(url('/star/'.str_slug($item->name)),Carbon::today(),'0.9','daily');
      }
      $directorList=Director::select('name')->get();
      foreach ($directorList as $item) {
        $Sitemap->add(url('/director/'.str_slug($item->name)),Carbon::today(),'0.9','daily');
      }
      return $Sitemap->render('xml');
    }

    public function feed(){
      $movieList=Movie::orderBy('created_at','desc')->take(20)->get();
      $feed=App::make('feed');
      $feed->title='Smovie.tv - Watch latest movies and tv series online';
      $feed->description='Latest movies and tv series';
      $feed->logo=url('/images/logo.png');
      $feed->link=url('feed');
      $feed->setDateFormat('datetime');
      $feed->pubdate=$movieList[0]->created_at;
      $feed->lang='en';
      $feed->setShortening(true);
       foreach ($movieList as $item) {
         $feed->add(
         $item->name,
         $item->directors()->first()->name,
         url('/movie/'.$item->slug),
         $item->created_at,
         $item->description,
         url('/play/'.$item->slug)
       );
       }
       return $feed->render('atom');
    }

}
