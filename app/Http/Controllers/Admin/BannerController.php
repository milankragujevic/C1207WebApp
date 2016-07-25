<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    public function index($id=null){
        if (isset($id)){
            $banner=Banner::find($id);
            $toggle=$banner->movie_id;
            if ($toggle!=0){
                $banner->movie_id=0;
                $banner->save();
            }else{
                $banner->movie_id=1;
                $banner->save();
            }
            return back();
        }else{
            $banners=Banner::all();
            return view('admin.banner')->with('banners',$banners);
        }
    }

    public function edit($id){
        $banner=Banner::find($id);
        return view('admin.edit_banner')->with('banner',$banner);
    }

    public function update(Request $request,$id){
        $banner=Banner::find($id);
        $option=$request->input('link');
        $file=$request->file('banner_img');
        $banner->option=$option;
        if (Input::hasFile('banner_img')){
            $filename='banner'.$id;
            $extension='.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/banner/'),$filename.$extension);
            $banner->link=$filename.$extension;
        }
        $banner->save();
        return redirect('/admin/banner');
    }
}
