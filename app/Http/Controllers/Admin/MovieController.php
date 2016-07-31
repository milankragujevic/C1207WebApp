<?php

namespace App\Http\Controllers\Admin;

use App\Actor;
use App\Director;
use App\Genre;
use App\Group;
use App\Movie;
use App\Movieimage;
use App\Movielink;
use App\Tag;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MovieController extends Controller
{
    /**
     * MovieController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = Input::get('perpage', 10);
        $listMovie = Movie::withTrashed()->with('groups')->orderBy('updated_at', 'desc')->paginate($perPage);
        $groups = Group::all();
        return view('admin.movie', compact('listMovie', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function newMovie()
    {
        $id=request('ownerid');
        request()->session()->put('movieid',$id);
        return view('admin.imdbrequest');
    }

    public function enable($id)
    {
        $movie = Movie::withTrashed()->find($id);
        if ($movie->trashed()) {
            $movie->restore();
            return back();
        }
        return back();
    }

    public function disable($id)
    {
        $movie = Movie::find($id);
        if (!$movie->trashed()) {
            $movie->delete();
            return redirect('admin/movie');
        }
        return back();

    }

    public function create(Request $request)
    {
        $imdbID = trim($request->get('imdbId'));
        $movie1 = Movie::whereImdbCode($imdbID)->first();
        $json = file_get_contents('http://www.omdbapi.com/?i=' . $imdbID . '&plot=full&r=json');
        $movie = json_decode($json, true);
        if ($movie['Type']=='series' || !isset($movie1)) {
            if ($movie['Response'] !== 'True') {
                $error = 'Wrong IMDB id !';
                return view('admin.imdbrequest')->with('errorMovie', $error);
            }
            if ($movie['Type'] == 'episode') {
//                if (!empty(Movie::whereImdbCode($movie['seriesID'])->first())) {
//                    $movie1 = Movie::whereImdbCode($movie['seriesID'])->first();
//                    $img = \Intervention\Image\Facades\Image::make($movie['Poster'])->save(public_path('images/episode/poster/') . str_slug($movie1->name . ' ' . $movie['Title']) . '.jpg');
//                    return view('admin.episode.episode_add')->with('movie1', $movie1)->with('movie', $movie);
//                } else {
//                    return back()->with('errorMovie', 'Bạn cần tạo movie trước khi tạo episode');
//                }

                $movieid=$request->session()->pull('movieid');
                if (isset($movieid)){
                    $movie1=Movie::find($movieid);
                    $img = \Intervention\Image\Facades\Image::make($movie['Poster'])->save(public_path('images/episode/poster/') . str_slug($movie1->name . ' ' . $movie['Title']) . '.jpg');
                    return view('admin.episode.episode_add')->with('movie1', $movie1)->with('movie', $movie);
                }else{
                    return back()->with('errorMovie', 'This is episode not movie');
                }
            }
            $img = \Intervention\Image\Facades\Image::make($movie['Poster'])->save(public_path('images/poster/') . str_slug($movie['Title']) . '.jpg');
            $request->session()->put('imdbId', $imdbID);
            if (isset($movie['totalSeasons'])) {
                $request->session()->put('totalSeasons', $movie['totalSeasons']);
            }
            $tags = 'watch free movies online, free movies, free movie,
watch free series movies online,' . $movie['Actors'] . ',' . $movie['Genre'];
            //dd($movie);
            $groups = Group::all();
            return view('admin.newmovie', compact('groups', 'movie', 'tags'));
        }else{
            $error = 'Movie already added !';
            return view('admin.imdbrequest')->with('errorMovie', $error);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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
        DB::beginTransaction();

            $movie = Movie::create([
                'name' => $request->input('movieName'),
                'title' => $request->input('movieName'),
                'description' => $request->input('movieDes'),
                'runtime' => $request->input('runtime'),
                'imdb_code' => $request->session()->get('imdbId', ''),
                'imdb_vote' => $request->input('imdbVotes'),
                'released' => $request->input('released'),
                'writer' => $request->input('writer'),
                'country' => $request->input('country'),
                'language' => $request->input('lang'),
                'rated' => $request->input('rated'),
                'poster' => str_slug($request->input('movieName')) . '.jpg',
                'trailer' => $request->input('trailer'),
                'award' => $request->input('award'),
                'type' => $request->input('type'),
                'rating' => $request->input('rating'),
                'quality' => isset($stringQuality) ? $stringQuality : '',
                'created_by' => Auth::user()->name,
                'updated_by' => Auth::user()->name,
                'total_seasons' => $request->session()->pull('totalSeasons', '')

            ]);

            $group = $request->input('group');
            if (!empty($group)) {
                foreach ($group as $item) {
                    $temp = Group::whereGroupName($item)->first();
                    $movie->groups()->attach($item);
                }
            }

            $actors = preg_split("/[,]+/", $request->input('actor'));
            foreach ($actors as $actor) {
                $item = Actor::firstOrCreate([
                    'name' => trim($actor)
                ]);
                $movie->actors()->attach($item->id);
            }

            $genres = preg_split("/[,]+/", $request->input('movieGenres'));
            foreach ($genres as $genre) {
                $item = Genre::firstOrCreate([
                    'name' => trim($genre)
                ]);
                $movie->genresmodel()->attach($item->id);
            }

            $directors = preg_split("/[,]+/", $request->input('director'));
            foreach ($directors as $director) {
                $item = Director::firstOrCreate([
                    'name' => trim($director)
                ]);
                $movie->directors()->attach($item->id);
            }

            $tags = preg_split("/[,]+/", $request->input('tags'));
            foreach ($tags as $tag) {
                $item = Tag::firstOrCreate([
                    'tag_content' => trim($tag)
                ]);
                $movie->tags()->attach($item);
            }

            $movie->movielinks()->saveMany([
                new Movielink(['provider' => 'Google Drive', 'link' => $request->input('google_drive')]),
                new Movielink(['provider' => 'Openload', 'link' => $request->input('openload')])
            ]);

        try {
            if ($movie->type == 'series') {
                $season = $request->input('season');
                $slug = $request->input('slug');
                if (isset($season)) {
                    $movie->season = $season;
                    $movie->slug = $slug . '-season-' . $season;
                    $movie->save();
                } else {
                    DB::rollback();
                    return back();
                }
            }else{
                $movie->slug=$request->input('slug');
                $movie->save();
            }
        }catch (\Exception $ex){
            DB::rollback();
            return back();
        }

        DB::commit();
        return redirect('admin/movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('admin.movieDetail')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $tags = $movie->tags()->get();
        $tagsString = '';
        foreach ($tags as $tag) {
            $tagsString .= $tag->tag_content . ',';
        }
        $tagsString = rtrim($tagsString, ',');
        $genres = $movie->genresmodel()->get();
        $genresString = '';
        foreach ($genres as $genre) {
            $genresString .= $genre->name . ',';
        }
        $genresString = rtrim($genresString, ',');
        $groups = Group::all();
        $googleLink = $movie->movielinks()->whereProvider('Google Drive')->first();
        $openloadLink = $movie->movielinks()->whereProvider('Openload')->first();
        return view('admin.editMovie', compact('googleLink', 'openloadLink', 'movie', 'groups', 'tagsString', 'genresString'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $movie = Movie::find($id);
            $movie->genresmodel()->detach();
            $movie->tags()->detach();
            $movie->groups()->detach();


            $movie->save(['detail' => $request->input('detail')]);

            $genres = preg_split("/[,]+/", $request->input('movieGenres'));
            foreach ($genres as $genre) {
                $item = Genre::firstOrCreate([
                    'name' => trim($genre)
                ]);
                $movie->genresmodel()->attach($item->id);
            }

            $tags = preg_split("/[,]+/", $request->input('tags'));
            foreach ($tags as $tag) {
                $item = Tag::firstOrCreate([
                    'tag_content' => trim($tag)
                ]);
                $movie->tags()->attach($item);
            }

            $group = $request->input('group');
            if (!empty($group)) {
                foreach ($group as $item) {
                    $temp = Group::whereGroupName($item)->first();
                    $movie->groups()->attach($item);
                }
            }

            $gooLink = $movie->movielinks()->whereProvider('Google Drive')->first();
            $gooLink->link = $request->input('google_link');
            $gooLink->save();
            $openlink = $movie->movielinks()->whereProvider('Openload')->first();
            $openlink->link = $request->input('openload_link');
            $openlink->save();

            $file=$request->file('poster');
            if (Input::hasFile('poster')){
                $filename=$movie->name.$movie->id;
                $extension='.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/poster/'),$filename.$extension);
                $movie->poster=$filename.$extension;
            }
            $movie->name=$request->input('name');
            $movie->slug=$request->input('slug');
            $movie->trailer=$request->input('trailer');
            $movie->rating=$request->input('rating');
            $movie->description=$request->input('description');
            $movie->released=$request->input('released');
            $movie->rated=$request->input('rated');
            $movie->language=$request->input('language');
            $movie->country=$request->input('country');

            $movie->save();

//            $poster = $request->file('poster');
//            if (isset($poster)) {
//                $poster->move(public_path('images/poster/', str_slug($movie->name) . '.' . $poster->getClientOriginalExtension()));
//                $movie->movieimages()->whereType('poster')->first()->update(['link' => str_slug($movie->name) . '.' . $poster->getClientOriginalExtension()]);
//            }

//            $banner = $request->file('banner');
//            if (isset($banner)) {
//                $request->file('banner')->move(public_path('images/banner/', str_slug($movie->name) . '.' . $banner->getClientOriginalExtension()));
//                if (empty($movie->movieimages()->whereType('banner')->first())) {
//                    $movie->movieimages()->save(new Movieimage([
//                        'link' => str_slug($movie->name) . '.' . $poster->getClientOriginalExtension(),
//                        'type' => 'banner'
//                    ]));
//                } else {
//                    $movie->movieimages()->whereType('banner')->first()->update(['link' => str_slug($movie->name) . '.' . $poster->getClientOriginalExtension()]);
//                }
//            }

        });
        return back();
    }

    public function tagsManager($id = null)
    {
        if ($id == null) {
            $tags = Tag::orderBy('tag_content')->get();
            return view('admin.tags')->with('tags', $tags);
        }
        if (isset($id)) {
            $tag = Tag::find($id);
            if (isset($tag)) {
                $option = $tag->option;
                if ($option == 'show') {
                    $tag->option = 'hide';
                    $tag->save();
                }
                if ($option == 'hide' || empty($tag->option)) {
                    $tag->option = 'show';
                    $tag->save();
                }
                return back();
            } else {
                return back();
            }
        }
    }

    public function checkLinkDie(Request $request){
        $count=Movielink::whereProvider('Google Drive')->whereStatus('Unavailable')->count();
        if ($request->input('unfix')==1) {
            $movieLink = Movielink::whereProvider('Google Drive')->whereStatus('Unavailable')->paginate(30);
        }else if ($request->input('check')==1){
            $movieLink=Movielink::all();
            foreach ($movieLink as $link){
                try{
                    file_get_contents(url('/googlelink/'.$link->link));
                }catch (\Exception $ex){
                    $link->status='Unavailable';
                    $link->save();
                }
            }
            return back();
        }else{
            $movieLink=Movielink::whereProvider('Google Drive')->where('status','not like','')->paginate(30);
            return view('admin.linkdie',compact('movieLink','count'));
        }

    }

}
