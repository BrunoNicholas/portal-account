<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('role:super-admin|admin|company-admin|salon-admin|shop-admin|attendant|client')->except('show','index');
        
        $this->middleware('permission:can_make_comment',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_comment',['only'=>'destroy']);
        $this->middleware('permission:can_edit_comment',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null, $id)
    {
        if ($type == 'post') {
            $post = Post::find($id);
            $comments   = $post->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        elseif ($type == 'question') {
            $question = Question::find($id);
            $comments   = $question->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        elseif ($type == 'company') {
            $company = Company::find($id);
            $comments   = $company->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        elseif ($type == 'project') {
            $project = Project::find($id);
            $comments   = $project->comments;
            return view('system.comments.index',compact(['comments','type','id']));
        }
        $comments = Comment::all();
        return view('system.comments.index',compact(['comments','type','id']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null, $id)
    {
        return view('system.comments.create',compact(['type','id']));
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
            'comment' => 'required',
        ]);
        Comment::create($request->all());
        if ($request->router) {
            if ($request->post_id) {
                return redirect()->route($request->router, $request->post_id)->with('success','Comment added successfully!');
            }
            elseif ($request->question_id) {
                return redirect()->route($request->router, $request->question_id)->with('success','Comment added successfully!');
            }
        }
        return redirect()->back()->with('success','Comment added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($type=null, $id, $comment_id)
    {
        $comment = Comment::find($comment_id);
        if (!$comment) {
            return redirect()->route('home')->with('danger', 'Comment Deleted Successfully');
        }
        return view('system.comments.show',compact(['comment','type','id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null, $id, $comment_id)
    {
        $comment = Comment::find($comment_id);
        if (!$comment) {
            return redirect()->route('home')->with('danger', 'Comment Deleted Successfully');
        }
        return view('system.comments.edit',compact(['comment','type','id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null,$item_id,$id)
    {
        request()->validate([
            'comment' => 'required',
        ]);
        Comment::find($id)->update($request->all());
        if ($request->router) {
            if ($request->post_id) {
                return redirect()->route($request->router, [$request->post_id])->with('success','Comment updated successfully!');
            }
            elseif ($request->question_id) {
                return redirect()->route($request->router, [$request->question_id])->with('success','Comment updated successfully!');
            }
        }
        return redirect()->back()->with('success','Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null,$item_id,$id)
    {
        $item = Comment::where('id',$id)->get()->first();
        $item->delete();
        return redirect()->back()->with('danger', 'Comment Deleted Successfully');
    }
}
