<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use File;

class GalleryController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('role:super-admin|admin|client')->except('show','index');
        
        $this->middleware('permission:can_make_image_uploads',['only'=>['create','store']]);
        // $this->middleware('permission:can_delete_salon',['only'=>'destroy']);
        // $this->middleware('permission:can_edit_salon',['only'=>['update','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);
        $countOthers = Gallery::whereNull('gallery_name')->whereNull('gallery_id')->get()->count();
        return view('system.galleries.index',compact(['galleries','countOthers']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('system.galleries.create',compact(['galleries']));
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
            'image'     => 'required',
            'user_id'   => 'required',
        ]);

        $image_item = new Gallery();
        
        // if ($request->hasFile('image')) {
        if ($request->file('image')->isValid()) {
            $fileWithExtension = $request->file('image')->getClientOriginalName();
            $fileWithoutExtension = pathinfo($fileWithExtension, PATHINFO_FILENAME);

            $user_image = $request->file('image');
            $filename = $fileWithoutExtension . '_' .time() . '.' . $user_image->getClientOriginalExtension();

            Image::make($user_image)->save( public_path('/files/galleries/images/' . $filename) );
            // $path = $request->file('image')->storeAs('public/gallery/', $filename);

            $image_item->image      = $filename;
            $image_item->gallery_name = $request->gallery_name;
            $image_item->gallery_id = $request->gallery_id;
            $image_item->description    = $request->description;
            $image_item->user_id    = $request->user_id;
            $image_item->title      = $request->title;
            $image_item->save();

            return back()->with('success','Gallery saved successfully!');
        }
        return back()->with('danger','You have not attached an image.\n Please do so and try again');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return back()->with('danger', 'Gallery not found. It is either missing or deleted.');
        }
        return view('system.galleries.show', compact(['gallery']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return back()->with('danger', 'Gallery not found. It is either missing or deleted.');
        }
        $galleries = Gallery::latest()->paginate(20);
        return view('system.galleries.edit', compact(['gallery','galleries']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'user_id'   => 'required',
            'status'    => 'required',
        ]);
        
        $gallery_item = Gallery::find($id);
        
        // if ($request->hasFile('image')) {
        if($request->image){
            if ($request->file('image')->isValid()) {

                $pathToImage = public_path('files/galleries/images/').$gallery_item->image;
                File::delete($pathToImage);

                $fileWithExtension = $request->file('image')->getClientOriginalName();
                $fileWithoutExtension = pathinfo($fileWithExtension, PATHINFO_FILENAME);

                $user_image = $request->file('image');
                $filename = $fileWithoutExtension . '_' .time() . '.' . $user_image->getClientOriginalExtension();

                Image::make($user_image)->save( public_path('/files/galleries/gallery/' . $filename) );
                // $path = $request->file('image')->storeAs('public/gallery/', $filename);

                $gallery_item->image = $filename;
            }
        }


        $gallery_item->gallery_name = $request->gallery_name;
        $gallery_item->description  = $request->description;
        $gallery_item->gallery_id = $request->gallery_id;
        $gallery_item->title    = $request->title;
        $gallery_item->user_id = $request->user_id;
        $gallery_item->save();

        return redirect()->route('galleries.index')->with('success','Gallery details updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::find($id);

        $pathToImage = public_path('files/galleries/images/').$item->image;
        File::delete($pathToImage);

        $item->delete();
        return redirect()->route('galleries.index')->with('danger', 'Gallery deleted successfully!');
    }
}
