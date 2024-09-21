@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>Admin Dashboard <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        <button class="viewable-container"><a href="/admin/all-orders">All Ordered Services &#8594;</a></button>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div>
    <br>
    <div class="wrapper-body-tag-lgx">
        @if (count($orderedServices) == 0)
        <br>
        <p class="empty-body">No order sent here!</p>
        @else
        <div class="show-my-placed-orders" style="border: none; width:100%;">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Customer Name</th>
                    <th>Costomer Phone</th>
                    <th>Order Date</th>
                </tr>
            @foreach ($orderedServices as $orderedService)
            <tr>
                <td>{{$orderedService->id}}</td>
                <td>{{$orderedService->itemName}}</td>
                <td>{{$orderedService->itemPrice}}</td>
                <td>{{$orderedService->customerName}}</td>
                <td>{{$orderedService->phoneNo}}</td>
                <td>{{$orderedService->created_at}}</td>
                
            </tr>
            @endforeach
            </table>
        </div>
        @endif
    </div><br>
   
</div>
</center>

@endsection
