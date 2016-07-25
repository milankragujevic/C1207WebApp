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
            $allEpisode = collect();
            for ($x = 1; $x <= $movie->total_seasons; $x++) {
                $listMovie = $movie->episodes()->whereSeason($x)->get();
                $allEpisode->put($x, $listMovie);
            }
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
        try {
            $codeGoogle = $movie->movielinks()->whereProvider('Google Drive')->first()->link;
            $view = Analytic::create(['view_count' => 1]);
            $movie->analytics()->save($view);
            $view = $movie->analytics()->count();
            $linkGoogle = file_get_contents(url('/googlelink/'.$codeGoogle));
            $linkGoogle = rtrim($linkGoogle, ',');
            $linkGoogle = '[' . $linkGoogle . ']';
            $linkGoogle = json_decode($linkGoogle, true);
            $linkGoogle = $linkGoogle[0]['file'];
            $codeOpenload = $movie->movielinks()->whereProvider('Openload')->first()->link;
            $linkOpenload = 'https://openload.co/embed/' . $codeOpenload . '/';
        } catch (\Exception $ex) {
            $view='';
            $linkGoogle = '';
            $linkOpenload = '';
        }
        return view('movie_play', compact('movie', 'linkGoogle', 'linkOpenload', 'view'));
    }


}
