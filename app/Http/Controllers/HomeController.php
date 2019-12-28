<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            $companies = Company::where('user_id',Auth::user()->id)->get();
            $shops = Shop::where('user_id',Auth::user()->id)->get();
            $salons = Salon::where('user_id',Auth::user()->id)->get();

            $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
            $messages   = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->latest()->paginate(10);

            return view('home',compact(['companies','salons','shops','inboxCount','messages']))->with('info','Welcome back, ' . ' - ' . Auth::user()->name . '!');
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

        $companies = Company::where('user_id',Auth::user()->id)->get();
        $shops = Shop::where('user_id',Auth::user()->id)->get();
        $salons = Salon::where('user_id',Auth::user()->id)->get();

        $inboxCount = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->count();
        $messages   = DB::table('messages')->where([['status', 'inbox'],['receiver', Auth::user()->id]])->latest()->paginate(10);

        return view('home',compact(['companies','salons','shops','inboxCount','messages']));
    }
}
