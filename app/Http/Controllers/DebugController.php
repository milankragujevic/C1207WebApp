<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Tag;
use Illuminate\Http\Request;


use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\AnalyticsServiceProvider;
use Spatie\Analytics\Period;

class DebugController extends Controller
{
    public function index()
    {
//        $movie=Movie::paginate(3)->url(2);
//        dd($movie);
        $url = url('/admin/haha', ['id' => 2, 'haha' => 'sdfsd']);
        //dd($url);
//        $movie= Movie::all();
//        $tag= Tag::find(1);
//        foreach ($movie as $item){
//
//        }
//
//        $movie=Movie::find(1);
//        dd($movie->view_today);
        $array = AnalyticsFacade::fetchMostVisitedPages(Period::days(7));
        $array = AnalyticsFacade::fetchVisitorsAndPageViews(Period::days(7));
        dd($array);

    }


}
