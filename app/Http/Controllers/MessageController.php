<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class MessageController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        $this->middleware('permission:can_message',['only'=>'index']);
        $this->middleware('permission:can_send_message',['only'=>['create','store']]);
        $this->middleware('permission:can_send_send_public_message',['only'=>'storeAll']);
        // $this->middleware('permission:can_respond_to_jobs',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=None)
    {
        $allCount   = DB::table('messages')->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->count();
        $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
        $trashCount = DB::table('messages')->where([['status', 'trash'],['receiver', Auth::user()->id]])->count();
        $draftCount = DB::table('messages')->where([['status', 'draft'],['sender', Auth::user()->id]])->count();
        $spamCount  = DB::table('messages')->where([['status', 'spam'],['receiver', Auth::user()->id]])->count();
        $sentCount  = DB::table('messages')->where('sender', Auth::user()->id)->whereNull('attachment')->count();
        $impCount   = DB::table('messages')->where([
            ['folder', 'important'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'important'],
                ['receiver', Auth::user()->id]])->count();
        $urgCount   = DB::table('messages')->where([
            ['folder', 'urgent'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'urgent'],
                ['receiver', Auth::user()->id]])->count();
        $offCount   = DB::table('messages')->where([
            ['folder', 'official'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'official'],
                ['receiver', Auth::user()->id]])->count();
        $unoffCount = DB::table('messages')->where([
            ['folder', 'unofficial'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'unofficial'],
                ['receiver', Auth::user()->id]])->count();
        $normalCount= DB::table('messages')->where([
            ['folder', 'normal'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'normal'],
                ['receiver', Auth::user()->id]])->count();
        $users      = User::all();
        if ($type == 'inbox') {
            $messages   = DB::table('messages')->where([['status', $type],['receiver', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'trash') {
            $messages   = DB::table('messages')->where([['status', $type],['receiver', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'draft') {
            $messages   = DB::table('messages')->where([['status', $type],['sender', '=', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'sent') {
            $messages   = DB::table('messages')->where('sender', Auth::user()->id)->whereNull('attachment')->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'spam') {
            $messages   = DB::table('messages')->where([['status', $type],['receiver', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        // priority mailing
        elseif ($type == 'important') {
            $messages   = DB::table('messages')->where([['folder', $type],['receiver', Auth::user()->id]])->orWhere([['folder', $type],['sender', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'urgent') {
            $messages   = DB::table('messages')->where([['folder', $type],['receiver', Auth::user()->id]])->orWhere([['folder', $type],['sender', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'official') {
            $messages   = DB::table('messages')->where([['folder', $type],['receiver', Auth::user()->id]])->orWhere([['folder', $type],['sender', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'unofficial') {
            $messages   = DB::table('messages')->where([['folder', $type],['receiver', Auth::user()->id]])->orWhere([['folder', $type],['sender', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        elseif ($type == 'normal') {
            $messages   = DB::table('messages')->where([['folder', $type],['receiver', Auth::user()->id]])->orWhere([['folder', $type],['sender', Auth::user()->id]])->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }else{
            $type = 'all';
            $messages   = DB::table('messages')->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->latest()->paginate(10);
            return view('user.messages.index', compact(['messages','type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCount   = DB::table('messages')->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->count();
        $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
        $trashCount = DB::table('messages')->where([['status', 'trash'],['receiver', Auth::user()->id]])->count();
        $draftCount = DB::table('messages')->where([['status', 'draft'],['sender', Auth::user()->id]])->count();
        $spamCount  = DB::table('messages')->where([['status', 'spam'],['receiver', Auth::user()->id]])->count();
        $sentCount  = DB::table('messages')->where('sender', Auth::user()->id)->whereNull('attachment')->count();
        $impCount   = DB::table('messages')->where([
            ['folder', 'important'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'important'],
                ['receiver', Auth::user()->id]])->count();
        $urgCount   = DB::table('messages')->where([
            ['folder', 'urgent'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'urgent'],
                ['receiver', Auth::user()->id]])->count();
        $offCount   = DB::table('messages')->where([
            ['folder', 'official'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'official'],
                ['receiver', Auth::user()->id]])->count();
        $unoffCount = DB::table('messages')->where([
            ['folder', 'unofficial'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'unofficial'],
                ['receiver', Auth::user()->id]])->count();
        $normalCount= DB::table('messages')->where([
            ['folder', 'normal'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'normal'],
                ['receiver', Auth::user()->id]])->count();
        $users      = User::latest()->paginate(100);
        $type = 'all';
        return view('user.messages.create', compact(['type','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type=None)
    {
        request()->validate([
            'sender'    => 'required',
            'receiver'  => 'required',
            'message'   => 'required',
        ]);
        if ($request->status == 'Draft') {
            $request->receiver = Auth::user()->id;
            Message::create($request->all());
            return redirect()->route('messages.index', 'inbox')->with('success','Message saved successfully as draft!');
        }
        Message::create($request->all());
        if ($request->router) {
            if ($type) {
                return redirect()->route($request->router, $type)->with('success','Message added successfully!');
            }
            return redirect()->route($request->router, 'all')->with('success','Message added successfully!');
        }
        return redirect()->route('messages.index', 'inbox')->with('success','Message sent successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAll(Request $request, $type=None)
    {
        request()->validate([
            'sender'    => 'required',
            'receiver'  => 'required',
            'message'   => 'required',
        ]);
        if ($request->status == 'Draft') {
            $request->receiver = Auth::user()->id;
            Message::create($request->all());
            return redirect()->route('messages.index', 'inbox')->with('success','Message saved successfully as draft!');
        }
        $sendMessages = [];
        $users = User::all();
        foreach ($users as $key => $user) {
            $msg    = [
                'sender'    =>  $request->sender,
                'receiver'  =>  $user->id,
                'folder'    =>  $request->folder,
                'title'     =>  $request->title,
                'message'   =>  $request->message,
                'priority'  =>  'unseen',
                'attachment'    =>  'group',
                'status'    =>  $request->status,
            ];
            array_push($sendMessages, $msg);
        }
        foreach ($sendMessages as $key => $value) {
            Message::create($value);
        }
        if ($request->router) {
            if ($type) {
                return redirect()->route($request->router, $type)->with('success','Message added successfully!');
            }
            return redirect()->route($request->router, 'all')->with('success','Message added successfully!');
        }
        return redirect()->route('messages.index', 'inbox')->with('success','Message sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message    = Message::find($id);
        $type       = 'inbox';
        
        if (!$message) {
            return redirect()->route('messages.index',$type)->with('danger', 'Message Not Found!');
        }

        if ($message->sender != Auth::user()->id && $message->receiver != Auth::user()->id) {
            return back()->with('warning','Access to resources not directed to you might lead to account suspense. Access Denied!');
        }

        $allCount   = DB::table('messages')->where('sender', Auth::user()->id)->orWhere('receiver', Auth::user()->id)->count();
        $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
        $trashCount = DB::table('messages')->where([['status', 'trash'],['receiver', Auth::user()->id]])->count();
        $draftCount = DB::table('messages')->where([['status', 'draft'],['sender', Auth::user()->id]])->count();
        $spamCount  = DB::table('messages')->where([['status', 'spam'],['receiver', Auth::user()->id]])->count();
        $sentCount  = DB::table('messages')->where('sender', Auth::user()->id)->whereNull('attachment')->count();
        $impCount   = DB::table('messages')->where([
            ['folder', 'important'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'important'],
                ['receiver', Auth::user()->id]])->count();
        $urgCount   = DB::table('messages')->where([
            ['folder', 'urgent'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'urgent'],
                ['receiver', Auth::user()->id]])->count();
        $offCount   = DB::table('messages')->where([
            ['folder', 'official'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'official'],
                ['receiver', Auth::user()->id]])->count();
        $unoffCount = DB::table('messages')->where([
            ['folder', 'unofficial'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'unofficial'],
                ['receiver', Auth::user()->id]])->count();
        $normalCount= DB::table('messages')->where([
            ['folder', 'normal'],
            ['sender', Auth::user()->id]])->orWhere([
                ['folder', 'normal'],
                ['receiver', Auth::user()->id]])->count();
        $users      = User::all();

        if ($message->sender == Auth::user()->id) {
            return view('user.messages.show', compact(['message','type','id','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
        }
        $message->update(['priority' => 'seen']);
        return view('user.messages.show', compact(['message','type','id','users','allCount','inboxCount','trashCount','draftCount','sentCount','spamCount','impCount','urgCount','offCount','unoffCount','normalCount']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        if (!$message) {
            return redirect()->route('messages.index')->with('danger', 'Message Not Found!');
        }
        return view('user.message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'sender'    =>  'required',
            'receiver'  =>  'required',
            'message'     =>  'required',
        ]);
        Message::find($id)->update($request->all());
        $type = 'inbox';
        return redirect()->route('messages.index','inbox')->with('success','Message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Message::find($id);
        $item->delete();
        return redirect()->route('messages.index','inbox')->with('danger', 'Message Deleted Successfully');
    }
}
