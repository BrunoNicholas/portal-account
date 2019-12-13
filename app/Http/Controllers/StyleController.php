<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StyleCreated;
use App\Models\Salon;
use App\Models\Categories;
use App\User;
use Auth;

class StyleController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        // $this->middleware('permission:can_view_questions',['only'=>'index']);
        // $this->middleware('permission:can_add_questions',['only'=>['create','store']]);
        // $this->middleware('permission:can_delete_post',['only'=>'destroy']);
        // $this->middleware('permission:can_update_questions',['only'=>['update','edit']]);
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
            $styles   = $shop->styles;
            return view('system.styles.index',compact(['styles','type','item_id']));
        }
        elseif ($type == 'salon') {
            $salon = Salon::find($item_id);
            if (!$salon) {
                return back()->with('danger','Salon not found. It is either deleted or it is missing.');
            }
            $styles   = $salon->styles;
            return view('system.styles.index',compact(['styles','type','item_id']));
        }
        $type = 'All';
        $styles = Style::latest()->paginate(50);
        return view('system.styles.index',compact(['styles','type','id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null,$item_id)
    {
        $salon = Salon::find($item_id);
        if (!$salon) {
            return back()->with('warning','You can not create a salon item without a valid salon. Salon not found!');
        }
        if (Auth::user()->id != $salon->user_id) {
            return back()->with('warning','You can only add salon item to your salon. Operation Blocked!');
        }
        $cats       = Categories::where('type','salon-gender')->orWhere('type','salon-style')->get();
        $styles   = Style::latest()->paginate(30);
        return view('system.styles.create',compact(['item_id','type','salon','cats','styles']));
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
            'style_name'    => 'required',
            'categories_id' => 'required',
            'user_id'       => 'required',
        ]);
        Style::create($request->all());
        $type = 'all';

        $style = Style::create($request->all());

        $user   = User::where('id',$style->user_id)->first();

        // mailing to user who has created the style
        Mail::to($user->email)->send(
            new StyleCreated($style)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show($type=null,$item_id,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$item_id, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null,$item_id,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null,$item_id,$id)
    {
        //
    }
}
