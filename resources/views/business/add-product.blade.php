@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<x-product_added />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Add Products / {{ Auth::guard('account')->user()->business_name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        @if (Auth::guard('account')->user()->contact == "")
        <p class="empty-body">You are not eligible to post product, Finish setting up your profile first! <a href="/business/business-profile" style="color: #0000FF;">Let's Go</a></p>
        @else

        <form action="/products" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            <h1>Add New Product Post</h1><br>
            <label for="">Product Name:</label>
            <input type="text" name="product_name" id="" placeholder="Product Name"><br><br>
            <label for="">Product Price:</label>
            <input type="text" name="price" id="" placeholder="Product Price"><br><br>
            <label for="">Product Picture:</label>
            <input type="file" name="product_picture" id="" style="border: none;"><br><br>
            <label for="">Product Description:</label>
            <textarea name="description" id="" placeholder="Short description about product"></textarea><br><br><br id="line-breaking-point">
            <input type="hidden" name="location" id="" value="{{Auth::guard('account')->user()->address}}">
            <input type="hidden" name="contact" id="" value="{{ Auth::guard('account')->user()->contact }}">
            <button type="submit">Post Product</button><br><br>
        </form>
        @endif
    </div>
</center>
@endsection
