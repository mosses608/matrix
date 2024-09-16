@extends('admin.admin-layout')

@section('content')
<style>
     .alert-success {
            color: #007bff; /* Border color matching the background */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .char-count-container {
        text-align: right;
        margin-top: -20px; /* Adjust this value to control vertical spacing */
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
            <h1>Add Service / {{ Auth::guard('web')->user()->name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>

        <form action="/admin/added-service" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            
            <h1>Add New Service</h1><br>
            <input type="hidden" class="form-control" id="serviceID" name="serviceID" required>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <label for="">Service Name:</label>
            <input type="text" name="serviceName" id="serviceName" placeholder="Service Name"><br><br>
            <label for="serviceDESC">Service Description:</label>
            <div class="text-area-container">
                <textarea name="serviceDESC" id="serviceDESC" placeholder="Service Description" maxlength="500" rows="4" cols="50"></textarea>
                <p id="charCount">0/500 characters</p>
            </div>
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

<script>
    const serviceDESC = document.getElementById('serviceDESC');
    const charCount = document.getElementById('charCount');
    const maxLength = 500;

    serviceDESC.addEventListener('input', () => {
        const typedChars = serviceDESC.value.length;
        charCount.textContent = `${typedChars}/${maxLength} characters`;
    });
</script>


    </div>
</center>

@endsection
