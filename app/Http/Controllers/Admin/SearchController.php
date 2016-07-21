<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request){

        $perPage=$request->input('$perpage');
        $groups=Group::all();
        $imdbId=$request->input('imdbId');
        $status=$request->input('status');
        $name=$request->input('movie_name');
        $group=$request->input('group');
        if (!empty($imdbId)){
            $listMovie=Movie::withTrashed()->whereImdbCode($imdbId)->get();
            return view('admin.movie',compact('listMovie','groups'));
        }
        if (!empty($name)){
            $listMovie=Movie::withTrashed()->where('name','like','%'.$name.'%')->orderBy('updated_at','desc')->get();
            return view('admin.movie',compact('listMovie','groups'));
        }
        if (!empty($status)||$status===0){
            if ($status==1){
                if (!empty($group)) {
                    $listMovie = Group::find($group)->movies()->get();
                    return view('admin.movie', compact('listMovie', 'groups'));
                }
                $listMovie=Movie::all();
                return view('admin.movie', compact('listMovie', 'groups'));
            }
            if ($status===0){
                if (!empty($group)) {
                    $listMovie = Group::find($group)->movies()->onlyTrashed()->get();
                    return view('admin.movie', compact('listMovie', 'groups'));
                }
                $listMovie=Movie::onlyTrashed()->get();
                return view('admin.movie', compact('listMovie', 'groups'));
            }
        }else{
            if (!empty($group)) {
                $listMovie = Group::find($group)->movies()->withTrashed()->get();
                return view('admin.movie', compact('listMovie', 'groups'));
            }
        }

        $listMovie=Movie::withTrashed()->orderBy('updated_at','desc')->get();
        return view('admin.movie',compact('listMovie','groups'));
    }
}
