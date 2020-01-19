<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Shop;
use Auth;

class ProductController extends Controller
{
    /**
     * Display the constructor of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->middleware('role:super-admin|admin|company-admin|shop-admin')->except('show','index');
        
        // $this->middleware('permission:can_view_questions',['only'=>'index']);
        // $this->middleware('permission:can_add_questions',['only'=>['create','store']]);
        // $this->middleware('permission:can_delete_post',['only'=>'destroy']);
        // $this->middleware('permission:can_update_questions',['only'=>['update','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type=null, $item_id)
    {
        if ($type != 'all') {

            $category = Categories::where('name',$type)->first();

            if ($category) {
                $type = $category->display_name;
                $stype= $category->name;

                $products = Product::where('categories_id',$category->id)->latest()->paginate(12);

                return view('system.products.index',compact(['products','type','stype']));
            }
            
            $type = 'all';

            return redirect()->route('products.index',[$type,0])->with('warning','Product category does not exist here!');
        }

        // sort from categories
        $products   = Product::latest()->paginate(20);

        return view('system.products.index',compact(['products','type','item_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type=null, $item_id)
    {
        $shop = Shop::find($item_id);
        if (!$shop) {
            return back()->with('warning','You can not create a shop item without a valid shop. Shop not found!');
        }
        if (Auth::user()->id != $shop->user_id) {
            return back()->with('warning','You can only add shop item to your shop. Operation Blocked!');
        }
        $cats       = Categories::where([['type','products-gender'],['status','active']])->get();
        $products   = Product::latest()->paginate(30);
        return view('system.products.create',compact(['item_id','type','shop','cats','products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type=null, $item_id)
    {
        request()->validate([
            'product_name'  => 'required',
            'user_id'       => 'required',
        ]);
        Product::create($request->all());
        $type = 'all';

        return redirect()->route('shops.show',['type',$request->shop_id])->with('success','Product created successfully! Now you can attach an image gallery on it.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($type=null, $item_id, $id)
    {
        $product    = Product::find($id);
        if (!$product) {
            return back()->with('danger', 'Product not found. It is either missing or deleted');
        }

        $shop   = Shop::find($item_id);
        if (!$shop) {
            return back()->with('warning','Looks like a broken link or the referenced shop does not exist.');
        }

        $gallery    = array();
        $images     = array();

        sizeof($product->galleries) > 0 ? $gallery = $product->galleries->first() : $gallery = [];

        sizeof($product->galleries) > 0 ? $images = $gallery->images : $images = [];

        return view('system.products.show', compact(['product','shop','type','images']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($type=null, $item_id, $id)
    {
        $product    = Product::find($id);
        if (!$product) {
            return back()->with('danger', 'Product not found. It is either missing or deleted');
        }
        return view('system.products.edit', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type=null, $item_id, $id)
    {
        request()->validate([
            'product_name'  => 'required',
            'user_id'       => 'required',
        ]);
        Product::find($id)->update($request->all());
        return redirect()->route('products.index',['type','item_id'])->with('success','Product created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($type=null, $item_id, $id)
    {
        $item = Product::where('id',$id)->get()->first();
        $item->delete();
        return redirect()->route('products.index',['type','item_id'])->with('danger', 'Product deleted successfully!');
    }
}
