@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>View Order <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        <button class="viewable-container"><a href="/admin/all-orders">All Orders &#8594;</a></button>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div>
    <br>
    <div class="wrapper-body-tag-lgx">
       
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
                <td>
                    <button type="button" class="edit-status-form" onclick="showEditStatus()"><i class="fa fa-edit"></i></button><br><br>
                    <button type="button" class="delet-actor" onclick="showDelete()"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
            </table>
        </div>

        <form action="/orders/status/{{$order->id}}" method="POST" class="edit-order-status">
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

        <form action="/orders/delete/{{$order->id}}" method="POST" class="delet-action-form">
            @csrf
            @method('DELETE')
            <p>Are you sure you want to delete this order?</p>
            <button type="submit">Yes</button>
            <button type="button" class="collapse" onclick="collapse()" style="float:right; background-color:maroon;">No</button>
        </form>
    </div><br>
    <br><br>

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
</div>
</center>

@endsection
