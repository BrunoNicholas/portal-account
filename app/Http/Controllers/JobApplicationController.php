<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        $this->middleware('permission:can_view_jobs',['only'=>'index']);
        $this->middleware('permission:can_add_job_opening',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_job_opening',['only'=>'destroy']);
        $this->middleware('permission:can_respond_to_jobs',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs   = JobApplication::latest()->paginate(50);
        return view('system.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'job_title' => 'required',
            'status' => 'required',
        ]);
        JobApplication::create($request->all());
        return redirect()->route('jobs.index')->with('success','Job application added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job    = JobApplication::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('danger','Job application not found. It is either missing or deleted');
        }
        return view('system.jobs.show',compact(['job']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job    = JobApplication::find($id);
        if (!$job) {
            return redirect()->route('jobs.index')->with('danger','Job application not found. It is either missing or deleted');
        }
        return view('system.jobs.show',compact(['job']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'job_title' => 'required',
            'status' => 'required',
        ]);
        JobApplication::find($id)->update($request->all());
        return redirect()->route('jobs.index')->with('success','Job application updated successfully carefully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = JobApplication::where('id',$id)->get()->first();
        $item->delete();
        return redirect()->back()->with('danger', 'Job application deleted successfully');
    }
}
