<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Company;
use App\User;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        if ($type == 'shop') {
            $shop = Shop::find($item_id);
            if (!$shop) {
                return back()->with('danger','Shop not found. It is either deleted or it is missing.');
            }
            $shops   = $shop->shops;
            return view('system.shops.index',compact(['shops','type',]));
        }
        elseif ($type == 'salon') {
            $salon = Shop::find($item_id);
            if (!$salon) {
                return back()->with('danger','Shop not found. It is either deleted or it is missing.');
            }
            $shops   = $salon->shops;
            return view('system.shops.index',compact(['shops','type']));
        }

        $shops = Shop::latest()->paginate(50);
        return view('system.shops.index',compact(['shops','type']));
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
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop  = Shop::find($id);
        if (!$shop) {
            return back()->with('danger','Shop not found. It is either deleted or it is missing.');
        }
        return view('system.shops.show', compact(['shop']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop  = Shop::find($id);
        if (!$shop) {
            return back()->with('danger','Shop not found. It is either deleted or it is missing.');
        }
        return view('system.shops.show', compact(['shop']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Shop::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());
        
        $item->delete();
        return redirect()->back()->with('danger', 'Shop details deleted successfully');
    }
}
