<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Salon;
use App\Models\Style;
use App\Models\Product;
use App\User;

class BookingController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('role:super-admin|admin|company-admin|salon-admin|shop-admin|attendant|client')->except('show','index');

        $this->middleware('permission:can_make_booking',['only'=>['create','store']]);
        // $this->middleware('permission:delete_user',['only'=>'destroy']);
        // $this->middleware('permission:edit_user',['only'=>['update','edit']]);
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
            $bookings   = $shop->bookings;
            return view('system.bookings.index',compact(['bookings','type','item_id']));
        }
        elseif ($type == 'salon') {
            $salon = Salon::find($item_id);
            if (!$salon) {
                return back()->with('danger','Salon not found. It is either deleted or it is missing.');
            }
            $bookings   = $salon->bookings;
            return view('system.bookings.index',compact(['bookings','type','item_id']));
        }
        elseif ($type == 'style') {
            $style = Style::find($item_id);
            if (!$shop) {
                return back()->with('danger','Style not found. It is either deleted or it is missing.');
            }
            $bookings   = $style->bookings;
            return view('system.bookings.index',compact(['bookings','type','item_id']));
        }
        elseif ($type == 'product') {
            $product = Product::find($item_id);
            if (!$product) {
                return back()->with('danger','Product not found. It is either deleted or it is missing.');
            }
            $bookings   = $product->bookings;
            return view('system.bookings.index',compact(['bookings','type','item_id']));
        }

        $bookings = Booking::latest()->paginate(50);
        return view('system.bookings.index',compact(['bookings','type','id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null, $id)
    {
        $bookings = Booking::latest()->paginate(50);
        return view('system.bookings.create',compact(['bookings','type','item_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type=null,$item_id)
    {
        request()->validate([
            'user_id' => 'required',
        ]);
        Booking::create($request->all());
        if ($type && $item_id) {
            return redirect()->route('bookings.index',[$type,$item_id])->with('success','Booking created successfully!');
        }
        return redirect()->back()->with('success','Booking created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($type=null, $item_id, $id)
    {
        $booking    = Booking::find($id);
        if (!$booking) {
            return back()->with('danger','Booking not found, it is either missing or deleted!');
        }
        return view('system.bookings.show', compact(['booking','type','item_id','id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null, $item_id, $id)
    {
        $booking    = Booking::find($id);
        if (!$booking) {
            return back()->with('danger', 'Booking not found. It is either missing or deleted');
        }
        return view('system.bookings.edit', compact(['booking','type','item_id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null, $item_id, $id)
    {
        request()->validate([
            'user_id' => 'required',
        ]);
        Booking::find($id)->update($request->all());
        if ($type && $item_id) {
            return redirect()->route('bookings.index',[$type,$item_id])->with('success','Booking created successfully!');
        }
        return redirect()->back()->with('success','Booking created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null,$item_id,$id)
    {
        $item = Booking::where('id',$id)->get()->first();
        $item->delete();
        return redirect()->back()->with('danger', 'Booking deleted successfully!');
    }
}
