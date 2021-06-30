<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Classes\ProductClass;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePd;
use App\Http\Requests\UpdatePd;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = DB::table('categories')->orderby('cat_id','desc')->get();
        return view('admin.product.create')->with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePd $request)
    {
         //upLoad Files
        $pdClass = new ProductClass();
        $file_name = $pdClass->handleUploadedImage($request->file('image'));

        //save database
        $pd = new Product();
        $cats = DB::table('categories')->orderby('cat_id','desc')->get();
        return view('admin.product.create', ['getAddProduct' => $pd->getNewProduct($request,$file_name)])->with('cats', $cats);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::withoutTrashed()->join('categories','categories.cat_id','=','products.cat_id')->orderby('products.product_id','desc')->paginate(3);
        return view('admin.product.list')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $cats = DB::table('categories')->orderby('cat_id','asc')->get();
        $pd = Product::find($product_id);
        return view('admin.product.edit')->with('pd',$pd)->with('cats',$cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePd $request)
    {
        //upLoad Files
        $pdClass = new ProductClass();
        $file_name = $pdClass->UploadedImage($request->file('image'), $request->id);
        
        //update database
        $pd = new Product();
        return redirect()->route('pd.list', ['getUpload' => $pd->getUpdateProduct($request,$file_name)])->with('message', 'Update Product SuccessFully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){ 
        Product::where('product_id',$id)->delete();
        //Task::where('id',$id)->forceDelete();
        return redirect()->route('pd.list'); 
    }
}
