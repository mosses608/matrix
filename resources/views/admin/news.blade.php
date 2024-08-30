@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')


<x-news_message />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Post News / {{ Auth::guard('web')->user()->name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        <form action="/notifications" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            <h1>Post News</h1><br>
            <label for="">News Title:</label>
            <input type="text" name="news_title" id="" placeholder="News Title"><br><br>
            <label for="">News Picture:</label>
            <input type="file" name="news_picture" id="" style="border: none;"><br><br>
            <label for="">News Description:</label>
            <textarea name="description" id="" placeholder="News Descriptions"></textarea><br><br>  <div  id="line-breaking-point"><br><br><br><br><br><br><br><br><br><br></div>
            <button type="submit">Post News</button><br><br>
        </form>
    </div>
</center>

@endsection
