<?php

namespace App\Http\Controllers;

use App\Group;
use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{

    public function showMovie($id){
        $movie= Movie::find($id);
        return $movie;
    }

    public function feature(){
        $movie=Group::whereGroupName('Recommend')->first()->movies()->orderBy('updated_at','desc')->take(12)->get();
        foreach ($movie as $item){
            $item->setVisible(['slug','poster','name','rating']);
        }
        return $movie;
    }

    public function topView(){

    }

    public function mostFav(){

    }

    public function topRate(){

    }

    public function search($name){
        $movie=Movie::where('name','like','%'.$name.'%')->take(6)->get();
        foreach ($movie as $item){
            $item->setVisible([
                'slug','name','rating','poster'
            ]);
        }
        return $movie;
    }
}
