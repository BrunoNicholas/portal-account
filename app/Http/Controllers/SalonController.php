<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salon  = Salon::find($id);
        if (!$salon) {
            return back()->with('danger','Salon not found. It is either deleted or it is missing.');
        }
        return view('system.salons.show', compact(['salon']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
