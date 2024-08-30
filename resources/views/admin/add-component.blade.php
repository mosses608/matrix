@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<x-component_mesg />

<x-project_posted />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Add Components / {{ Auth::guard('web')->user()->name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
<br>
        <form action="/components" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            <h1>Add New Compoents</h1><br>
            <label for="">Component Name:</label>
            <input type="text" name="component_name" id="component_name" placeholder="Component Name..."><br><br>

            <label for="">Component Price:</label>
            <input type="number" name="component_price" id="component_price" class="fileInput" placeholder="Price..."><br><br>

            <label for="">Component Picture:</label>
            <input type="file" name="component_picture[]" id="component_picture" multiple class="fileInput" style="border: none;" accept="image/*"><br><br>

            <button type="submit">Post Component</button><br><br>
        </form>
        <br>
    </div>
</center>

@endsection
