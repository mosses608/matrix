@extends('admin.admin-layout')

@section('content')
<style>
     .alert-success {
            color: #007bff; /* Border color matching the background */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .text-area-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: flex-end; /* Align items to the right */
        margin-bottom: 10px; /* Adjust this for spacing */
    }

    textarea {
        margin-bottom: 5px;
    }

    #charCount {
        font-size: 12px;
        color: #666;
        align-self: flex-end; /* Align the text to the right */
        margin-right: 20px;
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

        <form action="/admin-store-service-item" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            
            <h1>Add Service Item into <spna style="color: green">{{ $serviceName }}</spna></h1><br>
            <input type="hidden" class="form-control" id="serviceID" name="serviceID" required>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <input style="height: 20px;" type="hidden" name="serviceID" id="serviceID" value="{{ $id }}">
            <label for="">Item Name:</label>
            <input type="text" name="itemName" id="itemName" placeholder="Item Name"><br><br>
            <label for="">Item Price:</label>
            <input type="text" name="price" id="price" placeholder="item price"><br><br>
            <label for="">Item Description:</label>
            <div class="text-area-container">
                <textarea name="itemDESC" id="itemDESC" placeholder="Item Description" maxlength="500" rows="4" cols="50"></textarea>
                <p id="charCount">0/500 characters</p>
            </div>
            <label for="">Phone No:</label>
            <input type="text" name="phoneNo" id="phoneNo" placeholder="Phone Number"><br><br>
            <label for="">Location:</label>
            <input type="text" name="location" id="location" placeholder="location"><br><br>
            <label for="">Item Image</label>
            <input type="file" name="itemImage[]" id="itemImage" multiple class="fileInput" style="border: none;" accept="image/*"><br><br>
            @if ($errors->has('itemImage'))
    <div class="alert alert-danger">
        {{ $errors->first('itemImage') }}
    </div>
@endif

            <button type="submit">Add Item</button><br><br>
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

<script>
    const serviceDESC = document.getElementById('itemDESC');
    const charCount = document.getElementById('charCount');
    const maxLength = 500;

    serviceDESC.addEventListener('input', () => {
        const typedChars = serviceDESC.value.length;
        charCount.textContent = `${typedChars}/${maxLength} characters`;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('itemImage');
    
        fileInput.addEventListener('change', function () {
            const files = fileInput.files;
            if (files.length > 4) {
                alert('You can only select up to 4 images.');
                fileInput.value = ''; // Clear the selected files
            }
        });
    });
    </script>
    
@endsection
