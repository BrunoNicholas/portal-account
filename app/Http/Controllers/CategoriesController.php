<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:super-admin|admin|company-admin|salon-admin')->except('update','store','show');
        
        // $this->middleware('permission:can_make_booking',['only'=>['create','store']]);
        // $this->middleware('permission:delete_user',['only'=>'destroy']);
        // $this->middleware('permission:edit_user',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(50);
        return view('system.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('categories.index')->with('info', "Add new category from main categories page");
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
            'name' => 'required',
        ]);
        Categories::create($request->all());
        return back()->with('success','Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        if (!$category) {
            return back()->with('danger','Category not found. It is either missing or deleted.');
        }
        return view('system.categories.show',compact(['category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('categories.index')->with('info', "Edit category from main categories page");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
        ]);
        Categories::find($id)->update($request->all());
        return redirect()->route('categories.index')->with('success', "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Categories::where('id',$id)->get()->first();
        $item->delete();
        return redirect()->route('categories.index')->with('danger', 'Category deleted successfully');
    }
}
