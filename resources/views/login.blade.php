@extends('layout')

@section('content')
<br><br><br>

<center>
    <form action="/authenticate" method="POST" class="authenticate-middle-wrapper">
        @csrf
        <label for="">Username</label><br>
        <input type="text" name="username" id="" placeholder="Phone Number as Username"><br><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id="" placeholder="Password"><br><br>
        <button type="submit">Login</button>
        {{-- <span><a href="/reset-password">Reset Password</a></span> --}}
        <p>Don't have account? <a href="/register">Register</a></p><br><br>
    </form>
</center>

@endsection
