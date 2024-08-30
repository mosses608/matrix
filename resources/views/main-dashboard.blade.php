@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<x-login_success />

<x-login_success-login />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            @if (Auth::guard('account')->user()->user_role == 'Business')
            <h1>Business Dashboard / {{ Auth::guard('account')->user()->business_name }}</h1>
            @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif
            <br>
        </div>
        <br>
        @if (Auth::guard('account')->user()->user_role == 'Business')
        <div class="wrapper-body-tag-lgx">
            @if (count($products) == 0)
            <p class="empty-body">No products posted here! or No product found!</p>
            @else
            @foreach ($products as $product)
            <div class="single-item-loader">
                @if ($product->contact == Auth::guard('account')->user()->contact)
                <h1>{{ $product->product_name }}</h1>
                <img src="{{$product->product_picture ? asset('storage/' . $product->product_picture) : asset('assets/images/product.png')}}" alt="My Post"><br>
                <p>Price: {{$product->price}}</p>
                <button class="link-to-more"><a href="/business/read-more/{{$product->id}}">Read More</a></button>
                @else
                @endif
            </div>
            @endforeach
            @endif

        </div><br>

        <br><br>
        @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <div class="wrapper-body-tag-lgx">
            @if (count($products) == 0)
            <p class="empty-body">No products posted here! or No product found!</p>
            @else
            @foreach ($products as $product)
            <div class="single-item-loader">
                {{-- @if ($product->contact == Auth::guard('account')->user()->contact) --}}
                <h1>{{ $product->product_name }}</h1>
                <img src="{{$product->product_picture ? asset('storage/' . $product->product_picture) : asset('assets/images/product.png')}}" alt="My Post"><br>
                <p>Price: {{$product->price}}</p>
                <button class="link-to-more"><a href="/business/read-more/{{$product->id}}">Read More</a></button>
                {{-- @else --}}
                {{-- @endif --}}
            </div>
            @endforeach
            @endif

        </div><br>
        <div class="paginate-builder-complex">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</center>
@endsection
