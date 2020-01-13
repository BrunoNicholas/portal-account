<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Categories;
use App\Mail\StyleCreated;
use App\Models\Salon;
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
        $this->middleware('role:super-admin|admin|company-admin|salon-admin')->except('show','index');
        
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
        if ($type != 'all') {

            $category = Categories::where('name',$type)->first();

            if ($category) {
                $type = $category->display_name;
                $stype= $category->name;

                $styles = Style::where('categories_id',$category->id)->latest()->paginate(12);

                return view('system.styles.index',compact(['styles','type','stype']));
            }
            
            $type = 'all';

            return redirect()->route('styles.index',[$type,0])->with('warning','Fashion style category does not exist here!');
        }

        $chcat = Categories::where('type','children-style')->get();
        $lacat = Categories::where('type','male-style')->get();
        $fmcat = Categories::where('type','female-style')->get();
        $uxcat = Categories::where('type','unisex-style')->get();

        $child_arr   = array();
        $male_arr    = array();
        $female_arr  = array();
        $unisex_arr  = array();
        $i=0;

        foreach ($chcat as $key => $cat) {
            $arr1[++$i] = Style::where('categories_id',$cat->id)->get();
        }
        $child_style = array_merge($child_arr, [$arr1[1]]);
        $child_styles = $child_style[0];

        foreach ($lacat as $key => $cat) {
            $arr2[++$i] = Style::where('categories_id',$cat->id)->get();
        }
        $male_style = array_merge($male_arr, [$arr2[2]]);
        $male_styles = $male_style[0];

        foreach ($fmcat as $key => $cat) {
            $arr3[++$i] = Style::where('categories_id',$cat->id)->get();
            
        }
        $female_style = array_merge($female_arr, [$arr3[3]]);
        $female_styles = $female_style[0];

        foreach ($uxcat as $key => $cat) {
            $arr4[++$i] = Style::where('categories_id',$cat->id)->get();
        }
        $unisex_style = array_merge($unisex_arr, [$arr4[4]]);
        $unisex_styles = $unisex_style[0];
        
        $type   = 'All';
        $styles = Style::latest()->paginate(50);
        return view('system.styles.index',compact(['styles','child_styles','male_styles','female_styles','unisex_styles','type','id']));
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
        $cats       = Categories::where('type','children-style')->orWhere('type','male-style')->orWhere('type','female-style')->orWhere('type','unisex-style')->get();
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
        $type = 'all';

        $style = Style::create($request->all());

        $user   = User::where('id',$style->user_id)->first();

        // mailing to user who has created the style
        Mail::to($user->email)->send(
            new StyleCreated($style)
        );

        return redirect()->route('salons.show',['type',$request->salon_id])->with('success','Fashion style saved successfully! Now you can attach an image gallery on it.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show($type=null,$item_id,$id)
    {
        $style    = Style::find($id);
        if (!$style) {
            return back()->with('danger', 'Style not found. It is either missing or deleted');
        }

        $salon   = Salon::find($item_id);
        if (!$salon) {
            return back()->with('warning','Looks like a broken link or the referenced salon does not exist.');
        }
        return view('system.styles.show', compact(['style','salon','type']));
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
