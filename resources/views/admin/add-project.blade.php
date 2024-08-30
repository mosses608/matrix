@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')


<x-project_posted />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Add Project / {{ Auth::guard('web')->user()->name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>View Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>

        <form action="/projects" method="POST" class="add-new-product-cloud" enctype="multipart/form-data">
            @csrf
            <h1>Add New Project Post</h1><br>
            <label for="">Project Name:</label>
            <input type="text" name="project_name" id="project_name" placeholder="Project Name"><br><br>
            <label for="">Project Video:</label>
            <input type="file" name="project_video" id="project_video" class="fileInput" style="border: none;" accept="video/*"><br><br>
            <label for="">Documentation <strong>(PDF)</strong>:</label>
            <input type="file" name="project_picture" id="project_documentation" class="fileInput" style="border: none;" accept="application/pdf"><br><br>
            <button type="submit">Post Project</button><br><br>
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
