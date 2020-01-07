<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalonCreated;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Company;
use App\Models\Role;
use App\User;
use Auth;

class SalonController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('index','show');
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        // $this->middleware('permission:can_view_questions',['only'=>'index']);
        $this->middleware('permission:can_add_salon',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_salon',['only'=>'destroy']);
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

        if ($type != 'all') {
            $category = Categories::where('name',$type)->first();
            if ($category) {
                $type = $category->display_name;
                $stype= $category->name;
                $salons = Salon::where('categories_id',$category->id)->latest()->paginate(12);
                return view('system.salons.index',compact(['salons','type','stype']));
            }
            $type = 'all';
            return redirect()->route('salons.index',$type)->with('warning','Salon category does not exist');
        }
        $type   = 'All';
        $stype= 'all';
        return view('system.salons.index',compact(['salons','type','stype']));
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

        // if (!Auth::user()->hasRole(['super-admin','admin','company-admin'])) {
        //     // 
        // }
        Salon::create($request->all());

        $salon = Salon::where('salon_email',$request->salon_email)->first();

        // mailing to user who has made booking
        Mail::to($salon->salon_email)->send(
            new SalonCreated($salon)
        );

        if (Auth::user()->hasRole('company-admin') || Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')) {
            return redirect()->route('salons.show',['all',$salon->id])->with('success','Salon created successfully. You are now a salon administrator');
        }

        $user = User::find($request->user_id);
        $user->role = 'salon-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','salon-admin')->first());

        
        return redirect()->route('salons.show',['all',$salon->id])->with('success','Salon created successfully. You are now a salon administrator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show($type=null, $id)
    {
        if (!$type) {
            $type='all';
        }

        $salon  = Salon::find($id);
        if (!$salon) {
            return redirect()->route('salons.index',$type)->with('danger','Salon not found. It is either deleted or it is missing.');
        }

        $ratings_num  = $salon->ratings->count();
        $tot_sum      = 0;

        if ($ratings_num > 0) {
            foreach ($salon->ratings as $rat) {
                $tot_sum += $rat->rate_number;
            }
            $avg_ratings    = $tot_sum/$ratings_num;
        } else {
            $avg_ratings    = $tot_sum;
        }

        if (!$type) {
            $type = 'all';
        }
        $salons = Salon::latest()->paginate(3);
        $revs = $salon->reviews;
        return view('system.salons.show', compact(['type','salon','salons','revs','avg_ratings']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$id)
    {
        if (!$type) {
            $type='all';
        }

        $salon  = Salon::find($id);
        if (!$salon) {
            return back()->with('danger','Salon not found. It is either deleted or it is missing.');
        }
        $cats       = Categories::where('type','salon-style')->orWhere('type', 'salon-gender')->get();
        $companies  = Company::latest()->paginate();
        return view('system.salons.edit', compact(['salon','type','cats','companies']));
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
        request()->validate([
            'salon_name'    => 'required',
            'salon_email'   => 'required',
            'user_id'       => 'required',
        ]);

        Salon::find($id)->update($request->all());

        if (Auth::user()->hasRole('company-admin') || Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin')) {
            return redirect()->route('salons.show',['all',$salon->id])->with('success','Salon updated successfully. Salon administrator might be updated as well!');
        }

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','salon-admin')->first());

        
        return redirect()->route('salons.show',['all',$salon->id])->with('success','Salon updated successfully. Administrator might be updated too');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null, $id)
    {
        if (!$type) {
            $type='all';
        }

        $item = Salon::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());

        $item->delete();
        return redirect()->route('salons.index',$type)->with('danger', 'Salon deleted successfully');
    }
}
