@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>All Services <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div>
    <br>
    <div class="wrapper-body-tag-lgx">
        @if (count($adminServices) == 0)
        <br>
        <p class="empty-body">No Service added!</p>
        @else
        <div class="show-my-placed-orders" style="border: none; width:100%;">
            <table>
                <tr>
                    <th>serviceID</th>
                    <th>Service Name</th>
                    <th>Add Item</th> 
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            @foreach ($adminServices as $adminservice)
            <tr>
                <td>{{$adminservice->id}}</td>
                <td>{{$adminservice->serviceName}}</td>
                <td><a href="/admin-add-service-item/{{$adminservice->id}}/{{$adminservice->serviceName}}"><i style="color: blue" class="fas fa-plus"></i></a></td>
                <td><i style="color: green" class="fas fa-edit"></i></td>
                <td><a href=""><i style="color: red;" class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
            </table>
        </div>
        @endif
    </div><br>
   
    <br><br>
</div>
</center>

@endsection
