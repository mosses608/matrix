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
        <button class="viewable-container"><a href="/admin/all-orders">All Orders &#8594;</a></button>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div>
    <br>
    <div class="wrapper-body-tag-lgx">
        @if (count($orders) == 0)
        <br>
        <p class="empty-body">No order sent here!</p>
        @else
        <div class="show-my-placed-orders" style="border: none; width:100%;">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Project Name</th>
                    <th>Customer Name</th>
                    <th>Costomer Phone</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->project_name}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->contact}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    @if($order->status !="")
                    <span class="approved_content">{{$order->status}}</span>
                    @else
                    <span class="pending_content">Pending...</span>
                    @endif
                </td>
                <td><a href="/admin/view-action/{{$order->id}}"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
            </table>
        </div>
        @endif
    </div><br>
    <div class="paginate-builder-complex">
        {{ $orders->links() }}
    </div>
    <br><br>
</div>
</center>

@endsection
