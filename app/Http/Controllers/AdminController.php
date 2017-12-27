<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lesson;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $data['users'] = $users;
        $data['user'] = $user;
        return view('admin.index')->with($data);
    }
    
    public function addrole($id_user)
    {
        $user = User::find($id_user);
        $data['user'] = $user;
        return view('admin.addrole')->with($data);
    }
    
    
    public function create()
    {
        return view('lesson.create');    
    }
    public function createLesson(Request $request)
    {
        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->content = $request->input('content');
        $lesson->evaluation = $request->input('evaluation');
        $lesson->user_id = $request->input('user');
        $lesson->save();
        return Redirect('lesson/index')->with('msg','Has introducido la Lección correctamente');
    }
}