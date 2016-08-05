<?php

namespace App\Http\Controllers\Admin;

use App\Episode;
use App\Movie;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * UserController constructor.
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
        $staffs = User::withTrashed()->whereRole('staff')->orderBy('id')->get();
        return view('admin.UserManager.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.UserManager.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            $user=User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => 'staff'
            ]);
        });
        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $movieToday=Movie::whereType('movie')->whereCreatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        $episodeToday=Episode::whereCreatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        $movieAll=Movie::whereCreatedBy($user->name)->count();
        $allEpisode=Episode::whereCreatedBy($user->name)->count();
        //dd($movieAll);
        $linkDieFixed=Movie::whereUpdatedBy($user->name)->whereBetween('created_at',array(Carbon::today(), Carbon::tomorrow()))->count();
        return view('admin.UserManager.show_user',compact('user','movieToday','movieAll','linkDieFixed','episodeToday','allEpisode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->find($id);
        if (isset($user)) {
            return view('admin.UserManager.edit_user')->with('user', $user);
        }
        return back();
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => ''
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $password=$request->input('password');
        if (!empty($password)){
            $user->password = bcrypt($request->input('password'));
        }
        $user->email = $request->input('email');
        $user->save();
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->forceDelete();
        return back();
    }

    public function enable($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user->trashed()){
            $user->restore();
        }else {
            $user->delete();
        }
        return back();
    }
}
