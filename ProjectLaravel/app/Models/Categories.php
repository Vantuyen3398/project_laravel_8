<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_name',
    ];

    public function getNewCat($request) {
        $cat = DB::table('categories')->where('cat_name', $request->cat_name)->first();
        if (!$cat) {
            $newCat = new Categories();
            $newCat->cat_name = $request->cat_name;
            $newCat->save();
            return redirect()->route('cat.create')->with('message','Add Categories SuccessFully!');
        } else {
            return redirect()->route('cat.create')->with('message','Your Category Name existed, Categories can not be created');
        }
    }
}
