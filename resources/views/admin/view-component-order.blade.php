@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<x-updated_msg />

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
                <td>
                    <button type="button" class="edit-status-form" onclick="showEditStatus()"><i class="fa fa-edit"></i></button><br><br>
                    <button type="button" class="delet-actor" onclick="showDelete()"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            </table>
        </div>


        <form action="/comporders/status/{{$order->id}}" method="POST" class="edit-order-status">
            @csrf
            @method('PUT')
            <label for="">Order Status:</label>
            <select name="status" id="">
                <option value="{{$order->status}}">Select</option>
                <option value="Approved">Approve</option>
            </select>
            <br><br>
            <button type="submit">Update Status</button>
            <button type="button" onclick="collapseForm()" style="background-color:maroon; float:right;">Close</button>
            <br><br>
        </form>

        <form action="/comporders/delete/{{$order->id}}" method="POST" class="delet-action-form">
            @csrf
            @method('DELETE')
            <p>Are you sure you want to delete this order?</p>
            <button type="submit">Yes</button>
            <button type="button" class="collapse" onclick="collapse()" style="float:right; background-color:maroon;">No</button>
        </form>

    </div><br>

    <script>
        function showEditStatus(){
            document.querySelector('.edit-order-status').classList.toggle('active');
        }

        function collapseForm(){
            document.querySelector('.edit-order-status').style.display='none';
            location.reload();
        }

        function showDelete(){
            document.querySelector('.delet-action-form').classList.toggle('active');
        }

        function collapse(){
            document.querySelector('.delet-action-form').style.display='none';
            location.reload();
        }
    </script>
    <br><br>
    </div>
</center>

@endsection
