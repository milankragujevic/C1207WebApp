<?php

namespace App\Http\Controllers;

use App\Director;
use App\Genre;
use App\Group;
use App\Movie;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class FilterController extends Controller
{
    public function genre($genre){
        $title=$genre;
        $genre=Genre::whereName($genre)->first();
        if (isset($genre)) {
            $listMovie = $genre->movies()->orderBy('updated_at', 'desc')->paginate(30);
        }else{
            $listMovie=Movie::whereName('Haha')->paginate(30);
        }
        return view('movie_list',compact('title','listMovie'));
    }
    public function director($director){
        $title=$director;
        $listMovie=Director::whereName($director)->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function star($star){
        $title=$star;
        $listMovie=Genre::whereName($star)->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function country($country){
        $title=$country;
        $listMovie=Movie::where('country','like','%'.$country.'%')->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function cinema(){
        $title='Cinema';
        $listMovie=Group::whereGroupName('Cinema')->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function tvseries(){
        $title='TV Series';
        $listMovie=Movie::whereType('series')->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function topimdb(){
        $title='Top IMDB';
        $listMovie=Movie::orderBy('rating','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }
    public function hot(){
        $title='Hot Movie';
        $listMovie=Group::whereGroupName('Hot')->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }

    public function requested(){
        $title='Requested Movie';
        $listMovie=Group::whereGroupName('Requested')->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }

    public function tag($tag){
        $tag=Tag::find($tag);
        $title=$tag->tag_content;
        if (isset($tag)) {
            $listMovie = $tag->movies()->orderBy('updated_at', 'desc')->paginate(30);
        }
        return view('movie_list',compact('title','listMovie'));
    }


}
