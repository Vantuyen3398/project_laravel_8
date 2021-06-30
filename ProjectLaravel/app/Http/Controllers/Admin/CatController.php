<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Categories;
use App\Http\Requests\StoreCat;

class CatController extends Controller
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
        return view('admin.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCat $request)
    {
            //save database
            $cat = new Categories();
            return view('admin.cat.create', ['getAddCat' => $cat->getNewCat($request)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Categories::withoutTrashed()->paginate(3);
        return view('admin.cat.list',['cats'=>$data]);
    }

    public function delete($id){ 
        Categories::where('cat_id',$id)->delete();
        //Task::where('id',$id)->forceDelete();
        return redirect()->route('cat.list'); 
    }
}
