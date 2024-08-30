@extends('layout')

@section('content')
<br><br><br>

<center>
    <form action="/reset" method="POST" class="authenticate-middle-wrapper">
        @csrf
        <label for="">Email</label><br>
        <input type="email" name="email" id="" placeholder="Email"><br><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id="" placeholder="Password"><br><br>
        <button type="submit">Reset</button><br><br>
    </form>
</center>

@endsection
