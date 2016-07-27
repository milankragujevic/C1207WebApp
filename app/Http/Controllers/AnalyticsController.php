<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index(){
        $mostVisited=AnalyticsFacade::fetchTopReferrers(Period::days(7), 20);
        return $mostVisited;
    }
}
