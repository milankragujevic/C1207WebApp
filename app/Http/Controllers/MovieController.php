<?php

namespace App\Http\Controllers;

use App\Http\LinkGoogle\NEWCURL;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests;

class MovieController extends Controller
{


    public function show($slug)
    {
        $movie = Movie::whereSlug($slug)->first();
        if ($movie->type == 'series') {
            $allEpisode = collect();
            for ($x = 1; $x <= $movie->total_seasons; $x++) {
                $listMovie = $movie->episodes()->whereSeason($x)->get();
                $allEpisode->put($x, $listMovie);
            }
            return view('movie_detail', compact('movie', 'allEpisode'));
        }
        return view('movie_detail')->with('movie', $movie);
    }

    public function play($slug, $epislug = null)
    {
        $movie = Movie::whereSlug($slug)->first();
        if (!empty($epislug)) {
            $movie = $movie->episodes()->whereSlug($epislug)->first();
        }
        $codeGoogle = $movie->movielinks()->whereProvider('Google Drive')->first()->link;
        $codeGoogle = 'https://drive.google.com/file/d/' . $codeGoogle . '/view';
        try {
            $linkGoogle = file_get_contents(url('/googlelink/0BzWDDSOVVu0AalU2bHFFdUJLdEU'));
            $linkGoogle = rtrim($linkGoogle, ',');
            $linkGoogle = '[' . $linkGoogle . ']';
            $linkGoogle = json_decode($linkGoogle, true);
            $linkGoogle=$linkGoogle[0]['file'];
            //dd($linkGoogle[0]['file']);
            $codeOpenload = $movie->movielinks()->whereProvider('Openload')->first()->link;
            $linkOpenload = 'https://openload.co/embed/' . $codeOpenload . '/';
        } catch (\Exception $ex) {
            $linkGoogle = '';
            $linkOpenload = '';
        }
        return view('movie_play', compact('movie', 'linkGoogle', 'linkOpenload'));
    }


}
