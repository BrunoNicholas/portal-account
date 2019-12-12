<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Rating;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show','index');
        
        // $this->middleware('permission:can_view_questions',['only'=>'index']);
        $this->middleware('permission:can_review',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_salon',['only'=>'destroy']);
        $this->middleware('permission:can_update_review',['only'=>['update','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$type=null)
    {
        $review     = new Review();

        if ($type == 'company') {
            request()->validate([
                'company_id'=> 'required',
                'user_id'   => 'required',
            ]);
            $review->company_id     = $request->company_id;
        }
        elseif ($type == 'salon') {
            request()->validate([
                'salon_id'  => 'required',
                'user_id'   => 'required',
            ]);
            $review->salon_id = $request->salon_id;
        }
        elseif ($type == 'shop') {
            request()->validate([
                'shop_id'  => 'required',
                'user_id'   => 'required',
            ]);
            $review->shop_id = $request->shop_id;
        }
        else {
            return back()->with('danger','What are you doing?');
        }

        $review->review_message     = $request->review_message;
        $review->user_id            = $request->user_id;
        $review->save();

        if ($request->rate_number) {
            $rating                 = new Rating();
            $rating->user_id        = $request->user_id;

            if ($type == 'company') {
                request()->validate([
                    'company_id'   => 'required',
                    'user_id'      => 'required',
                ]);
                $rating->company_id = $request->company_id;
            }
            elseif ($type == 'salon') {
                request()->validate([
                    'salon_id'   => 'required',
                    'user_id'      => 'required',
                ]);
                $rating->salon_id   = $request->salon_id;
            }
            elseif ($type == 'shop') {
                request()->validate([
                    'shop_id'   => 'required',
                    'user_id'      => 'required',
                ]);
                $rating->shop_id    = $request->shop_id;
            }

            $rating->rate_number    = $request->rate_number;
            $rating->status         = $request->status;
            $rating->save();
        }

        return back()->with('success','Your review and rating have been saved successfully. Thank you, ' . Auth::user()->name .'!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
