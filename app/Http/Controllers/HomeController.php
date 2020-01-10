<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Message;
use App\Models\Company;
use App\Models\Salon;
use App\Models\Role;
use App\Models\Shop;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->hasRole(['super-admin','admin'])) {
            return redirect()->route('admin')->with('info','Welcome back, ' . (Role::where('name',Auth::user()->role)->first())->display_name . ' - ' . Auth::user()->name . '!');
        }
        elseif (Auth::user()->hasRole(['company-admin','salon-admin','shop-admin','attendant','barber'])) {

            // getting cordinates

            $gpsCompanies = Company::whereNotNull('company_gps')->get();
            $gpspont    = array();
            $gpsNames   = array();

            $gpsSalons = Salon::whereNotNull('salon_gps')->get();
            $salgpspont    = array();
            $salgpsNames   = array();

            $gpsShops = Shop::whereNotNull('shop_gps')->get();
            $shogpspont    = array();
            $shogpsNames   = array();

            foreach ($gpsCompanies as $val) {
                array_push($gpspont, explode(' ', $val->company_gps));
            array_push($gpsNames, ($val->company_name . ' | ' . $val->company_location));
            }

            foreach ($gpsSalons as $val) {
                array_push($salgpspont, explode(' ', $val->salon_gps));
            array_push($salgpsNames, ($val->salon_name . ' | ' . $val->salon_location));
            }

            foreach ($gpsShops as $val) {
                array_push($shogpspont, explode(' ', $val->shop_gps));
            array_push($shogpsNames, ($val->shop_name . ' | ' . $val->shop_location));
            }

            $gpsponts = json_encode($gpspont);
            $gps1ponts = json_encode($salgpspont);
            $gps2ponts = json_encode($shogpspont);

            $ptNum = sizeof($gpspont);
            $pt1Num = sizeof($salgpspont);
            $pt2Num = sizeof($shogpspont);

            // end of getting cordinates

            $companies = Company::where('user_id',Auth::user()->id)->get();
            $shops = Shop::where('user_id',Auth::user()->id)->get();
            $salons = Salon::where('user_id',Auth::user()->id)->get();

            $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
            $messages   = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->latest()->paginate(5);
            $cats       = Categories::where('type','company')->get();

            return view('home',compact(['companies','salons','shops','inboxCount','messages','cats','gpsponts','gps1ponts','gps2ponts','ptNum','pt1Num','pt2Num','gpsNames','salgpsNames','shogpsNames']))->with('info','Welcome back, ' . ' - ' . Auth::user()->name . '!');
        }
        return view('index'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        if (Auth::user()->hasRole('client')) {
            return redirect()->route('home')->with('info','You were redirected differently!');
        }

        // getting cordinates

        $gpsCompanies = Company::whereNotNull('company_gps')->get();
        $gpspont    = array();
        $gpsNames   = array();

        foreach ($gpsCompanies as $val) {
            array_push($gpspont, explode(' ', $val->company_gps));
            array_push($gpsNames, ($val->company_name . ' | ' . $val->company_location));
        }

        $gpsponts = json_encode($gpspont);

        $ptNum = sizeof($gpspont);

        // end of getting cordinates

        $companies = Company::where('user_id',Auth::user()->id)->get();
        $shops = Shop::where('user_id',Auth::user()->id)->get();
        $salons = Salon::where('user_id',Auth::user()->id)->get();
        $cats       = Categories::where('type','company')->get();

        $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
        $messages   = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->latest()->paginate(5);

        return view('home',compact(['companies','salons','shops','inboxCount','messages','cats','gpsponts','ptNum','gpsNames']));
    }
}
