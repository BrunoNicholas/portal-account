<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\User;

class CompanyController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
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
    public function index()
    {
        $companies  = Company::latest()->paginate(50);
        return view('system.companies.index',compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.companies.create');
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
        Company::create($request->all());

        $user = User::find($request->user_id);
        $user->role = 'company-admin';
        $user->save();

        DB::table('role_user')->where('user_id',$request->user_id)->delete();
        $user->attachRole(Role::where('name','company-admin')->first());

        $new_company = Company::where('company_email',$request->company_email)->first(); 
        return redirect()->route('companies.show',$new_company->id)->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company    = Company::find($id);
        if (!$company) {
            return redirect()->route('companies.index')->with('danger','Company not found. It is either missing or deleted.');
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

        return view('system.companies.show',compact(['company', 'avg']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company    = Company::find($id);
        if (!$company) {
            return redirect()->route('companies.index')->with('danger','Company not found. It is either missing or deleted.');
        }
        return view('system.companies.edit',compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        request()->validate([
            'company_name'  => 'required',
            'company_email' => 'required',
            'user_id'       => 'request',
        ]);
        Company::find($id)->update($request->all());
        return redirect()->route('categories.index')->with('success', "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Company::where('id',$id)->get()->first();
        
        $user = User::find($item->user_id);
        $user->role = 'client';
        $user->save();

        DB::table('role_user')->where('user_id',$item->user_id)->delete();
        $user->attachRole(Role::where('name','client')->first());

        $item->delete();
        return redirect()->back()->with('danger', 'Company deleted successfully');
    }
}
