@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<x-product_edited />

<x-order_placed />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>My Products /
                @if (Auth::guard('account')->user()->user_role == 'Business')
                {{ Auth::guard('account')->user()->business_name }}
                @elseif(Auth::guard('account')->user()->user_role == 'Customer')
                {{ Auth::guard('account')->user()->customer_name }}
                @endif
            </h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        <div class="wrapper-body-tag-lgx-main">

            @if (Auth::guard('account')->user()->user_role == 'Business')
            <div class="single-item-loader">
                @if ($product->contact == Auth::guard('account')->user()->contact)
                <h1>{{ $product->product_name }}</h1>
                <img src="{{$product->product_picture ? asset('storage/' . $product->product_picture) : asset('assets/images/product.png')}}" alt="My Post"><br>
                <p>Price: {{$product->price}}</p>
                <button class="link-to-more"><a href="/business/my-posts">All Posts</a></button><br><br>
                <button class="edit-act-button" onclick="showEditForm()"><i class="fa fa-edit"></i></button>
                <form action="/delete-product/{{$product->id}}" method="POST" class="delete-posted-product">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-posted-data"><i class="fas fa-trash-alt"></i></button>
                </form>
                <form action="/products/edit-product/{{$product->id}}" method="POST" class="edit-posted-produ" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="">Price:</label>
                    <input type="text" name="price" id="" value="{{ $product->price }}"><br><br>
                    {{-- <label for="">Picture:</label>
                    <input type="file" name="product_picture" id="" value="{{ $product->product_picture }}" style="border: none;"><br><br> --}}
                    <label for="">Product Name:</label>
                    <input type="text" name="product_name" id="" value="{{ $product->product_name }}"><br><br>
                    <button type="submit">Edit Post</button><br><br>
                </form>
                @else
                @endif
            </div>
            @elseif(Auth::guard('account')->user()->user_role == 'Customer' && Auth::guard('account')->user()->contact!="")

            <div class="single-item-loader">

                <h1>{{ $product->product_name }}</h1>
                <img src="{{$product->product_picture ? asset('storage/' . $product->product_picture) : asset('assets/images/product.png')}}" alt="My Post"><br>
                <p>Price: {{$product->price}}</p>
                <button class="order-place-component" onclick="showPlaceOrderForm()"><i class="fa fa-shopping-cart"></i> Place Order</button>

            </div>

            <form action="/orders" method="POST" class="order-place-user-complex" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="price" id="" value="{{ $product->price }}">
                {{-- <input type="text" name="company_name" id="" value="{{ $product->company_name }}"> --}}
                <input type="hidden" name="address" id="" value="{{ Auth::guard('account')->user()->address }}">
                <input type="hidden" name="contact" id="" value="{{ Auth::guard('account')->user()->contact }}">
                <input type="hidden" name="product_name" id="" value="{{ $product->product_name }}">
                <input type="hidden" name="product_picture" id="" value="{{ $product->product_picture }}">
                <input type="hidden" name="customer_name" id="" value="{{ Auth::guard('account')->user()->customer_name }}">
                <div class="centered-ajax-complex">
                    <label for="">Items Quantity:</label><br>
                    <input type="number" name="quantity" id="" class="main-inpu-field">
                </div><br>
                <button type="submit">Submit Order</button>
            </form>

            @else
            <p class="empty-body">You not eligible to place an order, Finish setting up your profile first!</p>

            @endif

            @if (Auth::guard('account')->user()->contact !="")
            <div class="description-wrapper">
                <span>
                    {{ $product->description }}
                </span>
            </div>
            @endif



        </div><br>
    </div>

    <script>
        function showEditForm(){
            document.querySelector('.edit-posted-produ').classList.toggle('active');
        }

        function showPlaceOrderForm(){
            document.querySelector('.order-place-user-complex').classList.toggle('active');
        }
    </script>
</center>

@endsection
