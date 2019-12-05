<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Shop;
use App\Models\Company;
use App\User;

class RatingController extends Controller
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
        $this->middleware('permission:can_rate',['only'=>['create','store']]);
        // $this->middleware('permission:can_delete_post',['only'=>'destroy']);
        $this->middleware('permission:can_update_rate',['only'=>['update','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null,$item_id)
    {
        if ($type == 'shop') {
            $shop = Shop::find($item_id);
            if (!$shop) {
                return back()->with('danger','Shop not found. It is either deleted or it is missing.');
            }





            $ratings   = $shop->ratings;
            return view('system.ratings.index',compact(['ratings','type','item_id']));
        }
        elseif ($type == 'salon') {
            $salon = Salon::find($item_id);
            if (!$salon) {
                return back()->with('danger','Salon not found. It is either deleted or it is missing.');
            }




            $ratings   = $salon->ratings;
            return view('system.ratings.index',compact(['ratings','type','item_id']));
        }
        elseif ($type == 'company') {
            $company = Company::find($item_id);
            if (!$shop) {
                return back()->with('danger','Company not found. It is either deleted or it is missing.');
            }





            $ratings   = $company->ratings;
            return view('system.ratings.index',compact(['ratings','type','item_id']));
        }

        $ratings = Rating::all();
        return view('system.ratings.index',compact(['ratings','type','id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null,$item_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type=null,$item_id)
    {
        request()->validate([
            'user_id'       => 'required',
            'rate_number'   => 'required',
        ]);
        Rating::create($request->all());

        return back()->with('success','Thanks for rating successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($type=null,$item_id,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$item_id,$id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$type=null,$item_id,$id)
    {
        request()->validate([
            'user_id'       => 'required',
            'rate_number'   => 'required',
        ]);
        Rating::find($id)->update($request->all());

        return back()->with('success','Thanks for rating successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null,$item_id,$id)
    {
        $item = Rating::find($id);
        $item->delete();
        return back()->with('danger', 'Rating removed successfully!');
    }
}
