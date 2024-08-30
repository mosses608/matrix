@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>My Orders History / {{ Auth::guard('account')->user()->customer_name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        <div class="show-my-placed-orders">
            @foreach ($orders as $order)
            <div class="loop-single-component">
                @if ($order->contact == Auth::guard('account')->user()->contact)
                <img src="{{ $order->product_picture ? asset('storage/' . $order->product_picture) : asset('asseta/images/profile.png') }}" alt="Order Product Picture"><br>
                <p>You ordered {{ $order->quantity }} {{ $order->product_name }} on <span>{{ $order->created_at }}</span></p>
                <p>Status:
                    @if ($order->status =="")
                    <em>Pending...</em>
                    @else
                    Successful
                    @endif
                </p>
                @endif
            </div>
            @endforeach
        </div>
        <br>
        <div class="paginate-builder-complex">
            {{ $orders->links() }}
        </div>
        <br>
    </div>
</center>

@endsection
