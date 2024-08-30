@extends('admin.admin-layout')

@section('content')
<br><br><br>

@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<x-text_message />

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>Admin Dashboard <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div>
    <br>
    <div class="wrapper-body-tag-lgx">
        <div class="show-my-placed-orders" style="border: none; width:100%;">

            <div class="loop-single-component">
                {{-- @if ($order->contact == Auth::guard('account')->user()->contact) --}}
                <img src="{{ $order->product_picture ? asset('storage/' . $order->product_picture) : asset('asseta/images/profile.png') }}" alt="Order Product Picture"><br>
                <p>{{ $order->quantity }} {{ $order->product_name }} were ordered by {{ $order->customer_name }}, <strong>({{ $order->contact }})</strong> from {{ $order->address }} on <span>{{ $order->created_at }}</span></p>
                <p>Order Status:
                    @if ($order->status =="")
                    <em><a href="/admin/admin-dashboard">Pending...</a></em>
                    @else
                    {{ $order->status }}
                    @endif
                </p>
                {{-- @endif --}}
            </div>
            <form action="/orders/edit_status/{{ $order->id }}" method="POST" class="edit-status-post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" id="" value="Completed">
                <button type="submit" class="submit-status-lgx">Complete an Order</button>
            </form>
        </div>

    </div><br>
    <br><br>
</div>
</center>

@endsection
