<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Classes\UserClass;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        //upLoad Files
        $userClass = new UserClass();
        $file_name = $userClass->handleUploadedImage($request->file('avatar'));

        //save database
        $user = new User();
        return view('admin.user.create', ['getAddUser' => $user->getNewUser($request,$file_name)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::withoutTrashed()->paginate(3);
        return view('admin.user.list', ['users'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit',['users'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request)
    {
        //unlink and upload image
        $userClass = new UserClass();
        $file_name = $userClass->uploadedImage($request->file('avatar'), $request->id);

        //update database
        $user = new User();
        return redirect()->route('user.list', ['getUploadUser' => $user->getUpdateUser($request,$file_name)])->with('message', 'Update User SuccessFully!');
    }

    public function delete($id){ 
        User::where('user_id',$id)->delete();
        //Task::where('id',$id)->forceDelete();
        return redirect()->route('user.list'); 
    }
}
