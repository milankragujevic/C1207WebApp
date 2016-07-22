<?php

namespace App\Http\Controllers\Admin;

use App\Episode;
use App\Movie;
use App\Movielink;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index($imdb)
    {
        $movie=Movie::whereImdbCode($imdb)->orWhere('id',$imdb)->first();
        if ($movie->type=='series'){
            $episodes=$movie->episodes()->orderBy('released')->get();
            return view('admin.episode.episode_list')->with('listMovies',$episodes)->with('movie',$movie);
        }else{
            return back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quality = $request->input('quality');
        if (is_array($quality)) {
            $stringQuality = null;
            foreach ($quality as $item) {

                $stringQuality .= $item . ',';
            }
            if (isset($stringQuality)) {
                $stringQuality = rtrim($stringQuality, ',');
            }
        }

        $movie=Movie::find($request->input('movieid'));
        DB::transaction(function () use ($request,$movie){
        $episode=Episode::firstOrCreate([
            'imdb_code'=>$request->input('imdb_code'),
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'poster'=>str_slug($movie->name.' '.$request->input('name')).'.jpg',
            'description'=>$request->input('description'),
            'season'=>$request->input('season'),
            'rating'=>$request->input('rating'),
            'released'=>$request->input('released'),
            'quality'=>isset($stringQuality) ? $stringQuality : '',
            'created_by' => Auth::user()->name,
            'updated_by' => Auth::user()->name,
        ]);
        $movie->episodes()->save($episode);
        $tags = preg_split("/[,]+/", $request->input('tags'));
        foreach ($tags as $tag) {
            $item = Tag::firstOrCreate([
                'tag_content' => trim($tag)
            ]);
            $episode->tags()->attach($item);
        }

        $movie->movielinks()->saveMany([
            new Movielink(['provider' => 'Google Drive', 'link' => $request->input('google_drive')]),
            new Movielink(['provider' => 'Openload', 'link' => $request->input('openload')])
        ]);
    });
        return redirect('/admin/episode/movie/'.$movie->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
