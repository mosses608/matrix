@extends('admin.admin-layout')

@section('content')
<br><br><br>

@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<x-admin_profile_edited />

<x-pass_user_admin />

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>My Profile <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div><br>

    <div class="left-mini-main-profile">
        <img src="{{Auth::guard('web')->user()->profile ? asset('storage/' . Auth::guard('web')->user()->profile):asset('assets/images/profile.png')}}" alt="My Profile"><br>
        <p>Admin Name: {{Auth::guard('web')->user()->name}}</p><br><br>
        <p>Phone Number: {{Auth::guard('web')->user()->contact}}</p><br><br>
        <p>Email Address: {{Auth::guard('web')->user()->email}}</p><br><br>
        {{-- <p>Location/Address: {{Auth::guard('web')->user()->address}}</p><br><br> --}}
    </div>

    <button class="profile-edit-view"><span onclick="hideEditProfile()" class="profile-wrapper">Edit Profile</span><span onclick="hideEditPass()" class="passuser-wrapper">Change Password</span></button>

    <br><br>
        <form action="/users/edit-profile/{{Auth::guard('web')->user()->id}}" method="POST" class="edit-profile-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Name:</label>
            <input type="text" name="name" id="" value="{{Auth::guard('web')->user()->name}}"><br><br>
            <label for="">Phone No:</label>
            <input type="number" name="contact" id="" value="{{Auth::guard('web')->user()->contact}}"><br><br>
            <label for="">Email:</label>
            <input type="email" name="email" id="" value="{{Auth::guard('web')->user()->email}}"><br><br>
            <label for="">Profile:</label>
            <input type="file" name="profile" id="" style="border: none;" value="{{ Auth::guard('web')->user()->profile }}"><br><br>
            <button type="submit">Edit Profile</button><br><br>
        </form>

        <form action="/users/changecode-user/{{Auth::guard('web')->user()->id}}" method="POST" class="edit-pass-user">
            @csrf
            @method('PUT')
            <label for="">Username:</label>
            <input type="text" name="username" id="" value="{{Auth::guard('web')->user()->username}}"><br><br>
            <label for="">Password:</label>
            <input type="text" name="password" id="" value="{{Auth::guard('web')->user()->password}}"><br><br>
            <button type="submit">Submit</button><br><br>
        </form>

</div>
<script>
    const passChanger=document.querySelector('.passuser-wrapper');
    const profileChanger=document.querySelector('.profile-wrapper');
    const buttonControl1=document.querySelector('.edit-profile-content');
    function hideEditPass(){
        document.querySelector('.edit-profile-content').style.display='none';
        document.querySelector('.edit-pass-user').style.display='block';
        passChanger.style.backgroundColor='#007BFF';
        passChanger.style.color='#FFFFFF';
        profileChanger.style.backgroundColor='#FFFFFF';
        profileChanger.style.color='#000';
    }

    function hideEditProfile(){
        location.reload();
    }
</script>
</center>

@endsection
