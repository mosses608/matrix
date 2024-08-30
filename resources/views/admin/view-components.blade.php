@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<x-comp_deleted />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>View Components / {{ Auth::guard('web')->user()->name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
<br>

<div class="wrapper-body-tag-lgx">
        @if (count($comporders) == 0)
        <br>
        <p class="empty-body">No order sent here!</p>
        @else
        <div class="show-my-placed-orders" style="border: none; width:100%;">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Component Name</th>
                    <th>Costomer Phone</th>
                    <th>Quantity</th>
                    <th>Price (@)</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            @foreach ($comporders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->component_name}}</td>
                <td>{{$order->contact}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    @if($order->status !="")
                    <span class="approved_content">{{$order->status}}</span>
                    @else
                    <span class="pending_content">Pending...</span>
                    @endif
                </td>
                <td><a href="/admin/view-component-order/{{$order->id}}"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
            </table>
        </div>
        @endif
    </div><br>
    <div class="paginate-builder-complex">
        {{ $comporders->links() }}
    </div>
    <br><br>
    </div>
</center>

@endsection
