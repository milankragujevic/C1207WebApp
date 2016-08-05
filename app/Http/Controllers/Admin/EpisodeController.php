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

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:staff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($imdb)
    {
        $movie=Movie::whereImdbCode($imdb)->orWhere('id',$imdb)->first();
        if ($movie->type=='series'){
            $episodes=$movie->episodes()->withTrashed()->orderBy('released')->get();
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
        $stringQuality = null;
        if (is_array($quality)) {

            foreach ($quality as $item) {

                $stringQuality .= $item . ',';
            }
            if (isset($stringQuality)) {
                $stringQuality = rtrim($stringQuality, ',');
            }
        }

        $movie=Movie::find($request->input('movieid'));
        DB::transaction(function () use ($request,$movie,$stringQuality){
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

        $episode->movielinks()->saveMany([
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
        $episode=Episode::find($id);
        $movie= $episode->movie;
        //dd($episode->movielinks()->whereProvider('Google Drive')->first());
        return view('admin.episode.episode_edit',compact('episode','movie'));
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
        DB::transaction(function ()use($request,$id){
            $episode=Episode::find($id);
            $gglink=$episode->movielinks()->whereProvider('Google Drive')->first();
            $gglink->link=$request->input('google_drive');
			      $gglink->save();
			      $openload=$episode->movielinks()->whereProvider('Openload')->first();
			      $openload->link=$request->input('openload');
			      $openload->save();

        });
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode=Episode::find($id);
        if (!isEmpty($episode)) {
        $episode->history()->forceDelete();
        }
        return back();
    }

    public function enable($id){
      $episode=Episode::withTrashed()->find($id);
      if ($episode->trashed()) {
        $episode->restore();
      }
      return back();
    }

    public function disable($id){
      $episode=Episode::find($id);
      if (!$episode->trashed()) {
        $episode->delete();
      }
      return back();
    }
}
