<?php

namespace App\Http\Controllers\Admin;

use App\Movierequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MovieRequestController extends Controller
{


    /**
     * MovieRequestController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id=null){
        $count=Movierequest::count();
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
        return view('admin.requested_page',compact('movieRequest','count'));
    }
}
