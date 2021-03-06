<?php
/**
 * Created by PhpStorm.
 * User: super
 * Date: 7/15/2016
 * Time: 12:12 AM
 */

namespace App\Http\VIewComposers;


use App\Group;
use App\Movie;
use App\Tag;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view){
        $hotMovie=Group::whereGroupName('Hot')->first()->movies()->orderBy('updated_at','desc')->take(12)->get();
        $latestTag=Tag::whereOption('show')->get();
        $requestedMovie=Group::whereGroupName('Requested')->first()->movies()->orderBy('updated_at','desc')->take(12)->get();
        $view->with(compact('hotMovie','latestTag','requestedMovie'));
    }

}