@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>View Project <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        <button class="viewable-container"><a href="/admin/projects">&#8592; Back</a></button>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div><br>

    <div class="single-loop-coz-looped">
        <h1>{{$project->project_name}} | <span>Posted on {{$project->created_at}}</span></h1><br><br>
        <embed src="{{asset('storage/' . $project->project_picture)}}" type="">
        <br>
        <!-- <button type="button"><a href="/admin/more-about/{{$project->id}}">More About This Project</a></button> -->
    </div>

    <button class="load-update-form" onclick="showEditPostForm()"><i class="fa fa-edit"></i> Update Project</button>
<br><br>
    <form action="/projects/edit/{{$project->id}}" method="POST" class="update-project-post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="">Project Name:</label>
        <input type="text" name="project_name" id="" value="{{$project->project_name}}"><br><br>
        <label for="">Project Video:</label>
        <input type="file" value="{{$project->project_video}}" name="project_video" style="border:none;"><br><br>
        <label for="">Project Documentation <strong>(PDF)</strong></label>
        <input type="file" name="project_picture" id="" value="{{$project->project_picture}}" style="border:none;"><br><br>
        <button type="submit">Update Project</button>
        <button type="button" class="closeForm" onclick="collapseForm()" style="background-color:maroon; float:right;">Close</button>
        <br><br>
    </form>

    <script>
        function collapseForm(){
            document.querySelector('.update-project-post').style.display='none';
            location.reload();
        }

        function showEditPostForm(){
            document.querySelector('.update-project-post').classList.toggle('active');
        }
    </script>
</div>
</center>

@endsection
