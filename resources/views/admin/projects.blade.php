@extends('admin.admin-layout')

@section('content')
<br><br><br>


@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')

<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>View Projects <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        <button class="viewable-container"><a href="/admin/all-orders">&#8592; Back</a></button>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div><br>
    @foreach($projects as $project)
    <div class="single-loop-coz">
        <h1>{{$project->project_name}} | <span>Posted on {{$project->created_at}}</span></h1><br><br>
        @if($project->project_video !="")
        <video src="{{ $project->project_video ? asset('storage/' . $project->project_video): asset('assets/videos/project_vide.mp4') }}" controls loop width="720" height="360" muted></video>    
        @endif
        <br>
        <button type="button"><a href="/admin/more-about/{{$project->id}}">More About This Project</a></button>
    </div>
    @endforeach
</div>
<br><br>
</center>

@endsection
