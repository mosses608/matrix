@extends('admin.admin-layout')

@section('content')
<style>
     .alert-success {
            color: #007bff; /* Border color matching the background */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
</style>
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')


<x-project_posted />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Add Service Item into <spna style="color: rgb(123, 123, 245)">{{ $serviceName }}</spna></h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>

        <form action="/admin/added-service" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            
            <h1>Add Service Item into <spna style="color: green">{{ $serviceName }}</spna></h1><br>
            <input type="hidden" class="form-control" id="serviceID" name="serviceID" required>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <label for="">Item Name:</label>
            <input type="text" name="itemName" id="itemName" placeholder="Item Name"><br><br>
            <label for="">Item Price:</label>
            <input type="text" name="price" id="price" placeholder="item price"><br><br>
            <label for="">Phone No:</label>
            <input type="text" name="phoneNo" id="phoneNo" placeholder="Phone Number"><br><br>
            <label for="">Location:</label>
            <input type="text" name="location" id="location" placeholder="location"><br><br>
            <label for="">Service Image</label>
            <input type="file" name="serviceImage" id="serviceImage" multiple class="fileInput" style="border: none;" accept="image/*"><br><br>
            <button type="submit">Add New Service</button><br><br>
        </form>


        <script>
            document.querSelectorAll(".fileInput input").addEventListener('change', function() {
            var file = this.files[0];
            if (file.size > 100 * 1024 * 1024) { // 10 MB
                alert('The selected file is too large.');
            this.value = ''; // Clear the file input
            }
            });
        </script>
    </div>
</center>

@endsection
