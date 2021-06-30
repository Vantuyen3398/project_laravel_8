@extends('admin.layout')
@section('admin_content')
    <div  class="form">
        <h2>Update User</h2>
        @if (session('message'))
            <span class="alert">
                <p>{{session('message')}}</p>
            </span>
        @endif
        <form id="contactform" action="{{route('user.update',['id' => $users['user_id']])}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <p class="contact"><label for="name">Name</label></p> 
            <input id="name" name="name" placeholder="First and last name"  tabindex="1" type="text" value={{$users['name']}}><br> 
            @if ($errors->has('name'))
                <span class="has-error">
                    <p>{{$errors->first('name')}}</p>
                </span>
            @endif
            <p class="contact"><label for="email">Email</label></p> 
            <input id="email" name="email" placeholder="example@domain.com"  type="email" value={{$users['email']}}><br>
            @if ($errors->has('email'))
                <span class="has-error">
                    <p>{{$errors->first('email')}}</p>
                </span>
            @endif 

            <p class="contact"><label for="username">Create a username</label></p> 
            <input id="username" name="username" placeholder="username"  tabindex="2" type="text" value={{$users['username']}}><br>
            @if ($errors->has('username'))
                <span class="has-error">
                    <p>{{$errors->first('username')}}</p>
                </span>
            @endif

            <p class="contact"><label for="date">Date Of Birth</label></p> 
            <input type="date" id="date" name="birthday" value={{$users['birthday']}}> 

            <p class="contact"><label for="img">Avatar</label></p>
            <input type="file" id="avatar" name="avatar" ><br>
            <img style="width: 100px; height: 100px;" src="/backend/image/avatar/{{$users['avatar']}}">
            <br/>
            <br/>
            @if ($errors->has('avatar'))
                <span class="has-error">
                    <p>{{$errors->first('avatar')}}</p>
                </span>
            @endif
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Update" type="submit">     
        </form> 
    </div>
@endsection
