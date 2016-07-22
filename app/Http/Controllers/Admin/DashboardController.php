<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard1()
    {
        return view('admin.dashboard1');
    }

    public function dashboard2()
    {
        return view('admin.dashboard2');
    }

    public function dashboard3()
    {
        return view('admin.dashboard3');
    }
}
