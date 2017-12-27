<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lesson;

class LessonController extends Controller
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
        $lessons = Lesson::with('user')->orderBy('id','asc')->orderBy('updated_at','desc')->get();
        $data['user'] = $user;
        
        $data['lessons'] = $lessons;
        return view('lesson.index')->with($data);
    }
    
    public function show($id){
        $lesson = Lesson::find($id);
        $data['lesson'] = $lesson;
        $data['id'] = $id;
        return view('lesson.show')->with($data);
    }
    
    public function testAgent(Request $request){
        $browser = get_browser(null, true);
        dd($browser);
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