<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salon;
use App\Models\Shop;
use App\Models\Question;
use App\Models\Company;
use App\Models\Role;
use App\User;

class AdminPageController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
	    $users 	= User::latest()->paginate(5);
		$roles 	= Role::latest()->paginate(5);
		$companies 	= Company::latest()->paginate(5);
		$shops 	= Shop::latest()->paginate(5);
		$salons = Salon::latest()->paginate(5);
	    $questions      = Question::latest()->paginate(20);

	    return view('admin.index', compact(['users','roles','shops', 'salons','questions','companies']));
	}
}
