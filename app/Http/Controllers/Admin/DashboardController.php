<?php

namespace App\Http\Controllers\Admin;

use App\Episode;
use App\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:staff');

    }

    public function dashboard1()
    {
        $user=Auth::user();
        $movieToday=Movie::whereType('movie')->whereCreatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        $episodeToday=Episode::whereCreatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        $movieAll=Movie::whereCreatedBy($user->name)->count();
        $allEpisode=Episode::whereCreatedBy($user->name)->count();
        //dd($movieAll);
        $linkDieFixed=Movie::whereUpdatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        return view('admin.dashboard1',compact('user','movieToday','movieAll','linkDieFixed','episodeToday','allEpisode'));
    }

    public function dashboard2()
    {
        return view('admin.dashboard2');
    }

    public function dashboard3()
    {
        return view('admin.dashboard3');
    }
}
