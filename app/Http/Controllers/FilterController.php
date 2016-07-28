<?php

namespace App\Http\Controllers;

use App\Actor;
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
        $genres=Genre::all();
        foreach ($genres as $item){
            if (str_slug($item->name)==$genre){
                $found=$item;
                break;
            }
        }
        $listMovie=$found->movies()->paginate(30);
        $title=$found->name;
        return view('movie_list',compact('title','listMovie'));
    }
    public function director($director){
        $directors=Director::all();
        foreach ($directors as $item){
            if (str_slug($item->name)==$director){
                $found=$item;
                break;
            }
        }
        $listMovie=$found->movies()->paginate(30);
        $title=$found->name;
        return view('movie_list',compact('title','listMovie'));
    }
    public function star($star){
        $stars=Actor::all();
        foreach ($stars as $item){
            if (str_slug($item->name)==$star){
                $found=$item;
                break;
            }
        }
        $listMovie=$found->movies()->paginate(30);
        $title=$found->name;
        return view('movie_list',compact('title','listMovie'));
    }
    public function country($country){
        $title=$country;
        $popularCountry=['Asia','China','France','Hong Kong','India','Japan','Korea','Thailand','Taiwan','UK','USA'];
        if ($title=='other'){
            $listMovie=Movie::where(function ($query)use($popularCountry){
                foreach ($popularCountry as $country){
                    $query->where('country','not like','%'.$country.'%');
                }
            })->paginate(30);
            return view('movie_list',compact('title','listMovie'));
        }
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
        $title='Hot';
        $listMovie=Group::whereGroupName('Hot')->first()->movies()->orderBy('updated_at','desc')->paginate(30);
        return view('movie_list',compact('title','listMovie'));
    }

    public function requested(){
        $title='Requested';
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

    public function search(Request $request){
        $query=$request->input('query');
        if (!isset($query)){
            return back();
        }
        $listMovie=Movie::where('name','like','%'.$query.'%')->orWhereHas('actors',function ($query1)use($query){
            $query1->where('name','like','%'.$query.'%');
        })->orWhereHas('directors',function ($query1)use($query){
            $query1->where('name','like','%'.$query.'%');
        })->paginate(30);
        $title='Result of '.$query;
        return view('movie_list',compact('title','listMovie'));
    }

}
