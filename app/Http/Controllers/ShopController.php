<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ShopCreated;
use App\Models\Categories;
use App\Models\Company;
use App\Models\Role;
use App\User;
use Auth;

class ShopController extends Controller
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
        $allshops  = Shop::latest()->paginate(12);
        if ($type != 'all') {
            $category = Categories::where('name',$type)->first();
            if ($category) {
                $type = $category->display_name;
                $stype= $category->name;
                if(sizeof($allshops) > 0){
                    $shops = Shop::where('categories_id',$category->id)->latest()->paginate(12);
                    return view('system.shops.index',compact(['shops','type','stype']));
                }
            }
            $type = 'all';
            return redirect()->route('shops.index',$type)->with('warning','Shop category does not exist');
        }
        $type   = 'All';
        $stype  = 'all';
        $shops  = Shop::latest()->paginate(20);
        return view('system.shops.index',compact(['shops','type','stype']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $cats       = Categories::where('type','products-gender')->get();
        $companies  = Company::latest()->paginate();
        return view('system.shops.create',compact(['type','cats','companies']));
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
            'shop_name'    => 'required',
            'shop_email'   => 'required|unique:shops',
            'user_id'       => 'required',
        ]);
        Shop::create($request->all());

        $shop = Shop::where('shop_email',$request->shop_email)->first();

        // mailing to user who has made booking
        Mail::to($shop->shop_email)->send(
            new ShopCreated($shop)
        );

        if (Auth::user()->hasRole('company-admin')) {
            return redirect()->route('shops.show',['all',$shop->id])->with('success','Shop created successfully. You are now a shop administrator');
        }

        $user = User::find($request->user_id);
        $user->role = 'shop-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','shop-admin')->first());

        $shop = Shop::where('shop_email',$request->shop_email)->first(); 
        return redirect()->route('shops.show',['all',$shop->id])->with('success','Shop created successfully. You are now a shop administrator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($type=null,$id)
    {
        if (!$type) {
            $type='all';
        }

        $shop  = Shop::find($id);
        if (!$shop) {
            return back()->with('danger','Shop not found. It is either deleted or it is missing.');
        }

        $ratings_num  = $shop->ratings->count();
        $tot_sum      = 0;

        if ($ratings_num > 0) {
            foreach ($shop->ratings as $rat) {
                $tot_sum += $rat->rate_number;
            }
            $avg_ratings    = $tot_sum/$ratings_num;
        } else {
            $avg_ratings    = $tot_sum;
        }

        $shops = Shop::latest()->paginate(3);
        $revs = $shop->reviews;
        return view('system.shops.show', compact(['shops','all','shop','revs','avg_ratings']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$id)
    {
        if (!$type) {
            $type='all';
        }

        $shop  = Shop::find($id);
        if (!$shop) {
            return back()->with('danger','Shop not found. It is either deleted or it is missing.');
        }
        return view('system.shops.show', compact(['all','shop']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null, $id)
    {
        if (!$type) {
            $type='all';
        }

        $item = Shop::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());
        
        $item->delete();
        return redirect()->route('shops.index',$type)->with('danger', 'Shop details deleted successfully. User made client');
    }
}
