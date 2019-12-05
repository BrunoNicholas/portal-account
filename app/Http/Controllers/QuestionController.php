<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        $this->middleware('permission:can_view_questions',['only'=>'index']);
        $this->middleware('permission:can_add_questions',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_post',['only'=>'destroy']);
        // $this->middleware('permission:can_update_questions',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate();
        return view('system.questions.index', compact(['questions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments    = Department::all();
        $projects       = Project::all();
        $questions = Question::latest()->paginate();
        return view('system.questions.create', compact(['questions','departments','projects']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'description'   => 'required',
            'asked_by'      => 'required',
        ]);
        Question::create($request->all());
        return redirect()->route('questions.index')->with('success','Your question is sent successfully! Please come back later once it has been responded to.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $questions = Question::all();
        if (!$question) {
            return redirect()->route('questions.index')->with('danger', 'Question Not Found!');
        }
        return view('system.questions.show', compact(['question','questions']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $departments    = Department::all();
        $projects       = Project::all();
        $users          = User::all();
        if (!$question) {
            return redirect()->route('questions.index')->with('danger', 'Question Not Found!');
        }
        return view('system.questions.edit', compact(['users','question','projects','departments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'description'   => 'required',
            'asked_by'      => 'required',
        ]);
        Question::find($id)->update($request->all());
        return redirect()->route('questions.index')->with('success','Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Question::find($id);
        $item->delete();
        return redirect()->route('questions.index')->with('danger', 'Question Deleted Successfully');
    }
}
