<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyCreated;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Role;
use App\User;
use Image;
use File;

class CompanyController extends Controller
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
        
        $this->middleware('permission:can_add_company',['only'=>['create','store']]);
        $this->middleware('permission:can_delete_comment',['only'=>'destroy']);
        $this->middleware('permission:can_update_company',['only'=>['update','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null)
    {
        $companies  = Company::latest()->paginate(12);

        if ($type != 'all') {
            $category = Categories::where('name',$type)->first();
            if ($category) {
                $type = $category->display_name;
                $stype= $category->name;
                $companies = Company::where('categories_id',$category->id)->latest()->paginate(12);
                return view('system.companies.index',compact(['companies','type','stype']));
            }
            $type = 'all';
            return redirect()->route('companies.index',$type)->with('warning','Account category does not exist');
        }
        $type = 'all';
        $stype= 'all';
        return view('system.companies.index',compact(['companies','type','stype']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null)
    {
        $cats       = Categories::where('type','company')->get();
        return view('system.companies.create',compact(['cats','type']));
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
            'company_name'  => 'required',
            'company_email' => 'required|unique:companies',
            'user_id'       => 'required|unique:companies',
        ]);
        $new_company = Company::create($request->all());

        $user = User::find($request->user_id);
        $user->role = 'company-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','company-admin')->first());

        if (!is_null($request->company_logo) && $request->file('company_logo')->isValid()) {
            $fileWithExtension = $request->file('company_logo')->getClientOriginalName();
            $fileWithoutExtension = pathinfo($fileWithExtension, PATHINFO_FILENAME);

            $user_image = $request->file('company_logo');
            $filename = $fileWithoutExtension . '_' .time() . '.' . $user_image->getClientOriginalExtension();

            Image::make($user_image)->save( public_path('/files/companies/images/' . $filename) );
            $co = Company::where('company_email',$request->company_email)->first();
            $co->company_logo = $filename;
            $co->save();
        }
        
        $company = $new_company;

        Mail::to($company->company_email)->send(
            new CompanyCreated($company)
        );

        $type='all';

        return redirect()->route('companies.show',[$type,$company->id])->with('success','Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($type=null,$id)
    {
        if (!$type) {
            $type='all';
        }
        $company    = Company::find($id);
        if (!$company) {
            return redirect()->route('companies.index',$type)->with('danger','Account not found. It is either missing or deleted.');
        }

        $total_ratings  = $company->ratings->count();
        $avg_avs     = 0;
        if ($total_ratings > 0) {
                foreach ($company->ratings as $rat) {
                $avg_avs += $rat->rate_number;
            }
            $avg    = $avg_avs/$total_ratings;
        } else {
            $avg    = $avg_avs;
        }

        $revs = $company->reviews;
        return view('system.companies.show',compact(['company','type','avg','revs']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null,$id)
    {
        if (!$type) {
            $type='all';
        }
        
        $company    = Company::find($id);
        if (!$company) {
            return redirect()->route('companies.index',$type)->with('danger','Account not found. It is either missing or deleted.');
        }
        return view('system.companies.edit',compact(['company','type']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null, $id)
    {
        
        request()->validate([
            'company_name'  => 'required',
            'company_email' => 'required',
            'user_id'       => 'request',
        ]);
        Company::find($id)->update($request->all());
        return redirect()->route('categories.index',$type)->with('success', "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null, $id)
    {
        $item = Company::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());

        $item->delete();
        return redirect()->back()->with('danger', 'Account deleted successfully! User made client.');
    }
}
