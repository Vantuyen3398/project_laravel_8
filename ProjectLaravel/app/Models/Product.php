<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'cat_id',
        'price',
        'image',
    ];

    public function getNewProduct($request,$file_name) 
    {
        $product = DB::table('products')->where('product_name', $request->product_name)->first();
            if (!$product) {
                $newProduct = new Product();
                $newProduct->product_name = $request->product_name;
                $newProduct->cat_id = $request->cat_id;
                $newProduct->price = $request->price;
                $newProduct->image = $file_name;
                $newProduct->save();
                return redirect()->route('pd.create')->with('message','Add Product SuccessFully!');
            } else {
                return redirect()->route('pd.create')->with('message','Your Product Name existed, Product can not be created');
            }
    }

    public function getUpdateProduct($request, $file_name)
    {
        if ($file_name) {
                $data = Product::find($request->id);
                $data->product_name = $request->product_name;
                $data->cat_id = $request->cat_id;
                $data->price = $request->price;
                $data->image = $file_name;
                $data->save();
            } else {
                $data = Product::find($request->id);
                $data->product_name = $request->product_name;
                $data->cat_id = $request->cat_id;
                $data->price = $request->price;
                $data->save();
            }
    }
}
