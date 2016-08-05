<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Http\LinkGoogle\NEWCURL;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests;

class MovieController extends Controller
{


    public function show($slug)
    {
        $movie = Movie::whereSlug($slug)->first();
        $genres = $movie->genresmodel()->get();
        $relatedPost = Movie::orderBy('updated_at', 'desc');
        foreach ($genres as $genre) {
            $relatedPost->whereHas('genresmodel', function ($query) use ($genre) {
                $query->whereName($genre->name);
            });
        }
        $relatedPost = $relatedPost->take(12)->get();
        //dd($relatedPost);
        if ($movie->type == 'series') {
            $allEpisode = $movie->episodes()->get();
            return view('movie_detail', compact('movie', 'allEpisode'))->with('relatedMovie', $relatedPost);
        }
        return view('movie_detail')->with('movie', $movie)->with('relatedMovie', $relatedPost);
    }

    public function play($slug, $epislug = null)
    {
        $movie = Movie::whereSlug($slug)->first();
        if (!empty($epislug)) {
            $movie = $movie->episodes()->whereSlug($epislug)->first();
        }
			$view = Analytic::create(['view_count' => 1]);
            $movie->analytics()->save($view);
            $view = $movie->analytics()->count();
        try {
            $codeGoogle = $movie->movielinks()->whereProvider('Google Drive')->first()->link;
            $linkGoogle = file_get_contents(url('/googlelink/'.$codeGoogle));
            //$linkGoogle = file_get_contents(url('/googlelink/'.'0BzWDDSOVVu0AeDNVMDU2VUdoeG8'));
			//dd($linkGoogle);
            $linkGoogle = json_decode($linkGoogle,true);
			$temp=collect();
			foreach ($linkGoogle as $key=>$value){
            $temp->put($value['label'],$value['file']);
			};
			$linkGoogle=$temp;
            
        } catch (\Exception $ex) {
            $linkGoogle = collect();
			$linkGoogle['1080p']='';
            $linkGoogle['720p']='';
            $linkGoogle['480p']='';
            $linkGoogle['360p']='';          
        }
		
		try{
			$codeOpenload = $movie->movielinks()->whereProvider('Openload')->first()->link;
            $linkOpenload = 'https://openload.co/embed/' . $codeOpenload . '/';
		}catch(\Exception $ex){
			$linkOpenload='';
		}
        return view('movie_play', compact('movie', 'linkGoogle', 'linkOpenload', 'view'));
    }

    public function getLinkAjax(){

    }

}
