@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<x-account_edited />

<x-pass_user_edited />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Business Profile / {{ Auth::guard('account')->user()->business_name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Profile / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div><br>

        <div class="left-mini-main-profile">
            <img src="{{Auth::guard('account')->user()->profile ? asset('storage/' . Auth::guard('account')->user()->profile):asset('assets/images/profile.png')}}" alt="My Profile"><br>
            <p>Business Name: {{Auth::guard('account')->user()->business_name}}</p><br><br>
            <p>Phone Number: {{Auth::guard('account')->user()->contact}}</p><br><br>
            <p>Email Address: {{Auth::guard('account')->user()->email}}</p><br><br>
            <p>Location/Address: {{Auth::guard('account')->user()->address}}</p><br><br>
        </div>

        <button class="profile-edit-view"><span onclick="hideEditProfile()" class="profile-wrapper">Edit Profile</span><span onclick="hideEditPass()" class="passuser-wrapper">Change Password</span></button>
<br><br>
        <form action="/accounts/edut-profile/{{Auth::guard('account')->user()->id}}" method="POST" class="edit-profile-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="">Name:</label>
            <input type="text" name="business_name" id="" value="{{Auth::guard('account')->user()->business_name}}"><br><br>
            <label for="">Phone No:</label>
            <input type="number" name="contact" id="" value="{{Auth::guard('account')->user()->contact}}"><br><br>
            <label for="">Email:</label>
            <input type="email" name="email" id="" value="{{Auth::guard('account')->user()->email}}"><br><br>
            <label for="">Address:</label>
            <input type="text" name="address" id="" value="{{Auth::guard('account')->user()->address}}"><br><br>
            <label for="">Profile:</label>
            <input type="file" name="profile" id="" style="border: none;"><br><br>
            <button type="submit">Edit Profile</button><br><br>
        </form>

        <form action="/accounts/changeapss-user/{{Auth::guard('account')->user()->id}}" method="POST" class="edit-pass-user">
            @csrf
            @method('PUT')
            <label for="">Username:</label>
            <input type="text" name="username" id="" value="{{Auth::guard('account')->user()->username}}"><br><br>
            <label for="">Password:</label>
            <input type="text" name="password" id="" value="{{Auth::guard('account')->user()->password}}"><br><br>
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
