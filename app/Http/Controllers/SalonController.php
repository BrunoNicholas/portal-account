<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Company;
use App\User;

class SalonController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        // $this->middleware('permission:can_view_questions',['only'=>'index']);
        $this->middleware('permission:can_add_salon',['only'=>['create','store']]);
        // $this->middleware('permission:can_delete_post',['only'=>'destroy']);
        $this->middleware('permission:can_edit_salon',['only'=>['update','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        $salons = Salon::latest()->paginate(50);
        return view('system.salons.index',compact(['salons','type']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $cats       = Categories::where('type','salon-style')->orWhere('type', 'salon-gender')->get();
        $companies  = Company::latest()->paginate();
        return view('system.salons.create',compact(['type','cats','companies']));
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
            'salon_name'    => 'required',
            'salon_email'   => 'required|unique:salons',
            'user_id'       => 'required',
        ]);
        Salon::create($request->all());

        $user = User::find($request->user_id);
        $user->role = 'salon-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','salon-admin')->first());

        $new_salon = Salon::where('salon_email',$request->salon_email)->first(); 
        return redirect()->route('salons.show',['all',$new_salon->id])->with('success','Salon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show($type=null, $id)
    {
        $salon  = Salon::find($id);
        if (!$salon) {
            return back()->with('danger','Salon not found. It is either deleted or it is missing.');
        }

        if (!$type) {
            $type = 'all';
        }
        return view('system.salons.show', compact(['type','salon']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$id)
    {
        $salon  = Salon::find($id);
        if (!$salon) {
            return back()->with('danger','Salon not found. It is either deleted or it is missing.');
        }
        return view('system.salons.edit', compact(['salon']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null, $id)
    {
        $item = Salon::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());

        $item->delete();
        return redirect()->back()->with('danger', 'Salon details deleted successfully');
    }
}
