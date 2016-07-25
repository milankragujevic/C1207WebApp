<?php

namespace App\Http\Controllers\Admin;

use App\Movierequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MovieRequestController extends Controller
{
    public function show($id=null){
        if (isset($id)){
            $movieRequest=Movierequest::find($id);
            $status=$movieRequest->status;
            if ($status==0){
                $movieRequest->status=1;
                $movieRequest->save();
            }else{
                $movieRequest->status=0;
                $movieRequest->save();
            }
            return back();
        }
        $movieRequest=Movierequest::orderBy('updated_at','desc')->paginate(20);
        return view('admin.requested_page')->with('movieRequest',$movieRequest);
    }
}
