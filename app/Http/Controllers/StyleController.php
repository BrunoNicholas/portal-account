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

        $style = Style::create($request->all());

        $user   = User::where('id',$style->user_id)->first();

        // mailing to user who has made booking
        Mail::to($style->shop_email)->send(
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
