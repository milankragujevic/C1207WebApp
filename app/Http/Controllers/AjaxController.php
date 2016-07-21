<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{

    public function showMovie($id){
        $movie= Movie::find($id);
        return $movie;
    }

    public function feature(){

    }

    public function topView(){

    }

    public function mostFav(){

    }

    public function topRate(){

    }
}
