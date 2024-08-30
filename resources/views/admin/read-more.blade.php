@extends('layout')

@section('content')
<br><br><br>

<x-order_placed_success />

<center>
    <div class="concentrated-ajax-component-loader">
        <h2>Title: {{ $project->project_name }}</h2><br><br>
        <div class="concentrated-items-loaded-viewer">
            <embed src="{{ $project->project_picture ? asset('storage/' . $project->project_picture) : asset('assets/images/profile.jpg') }}" type="application/pdf" width="100%" height="600px" />
        </div><br><br>
        <div class="project-decriptio">
            <p>{{ $project->description }}</p>
        </div>
<br><br><br>

{{-- <embed src="{{ $project->project_picture ? asset('storage/' . $project->project_picture) : asset('assets/images/profile.jpg') }}" type="application/pdf" width="100%" height="600px" /> --}}

<form action="/orders" method="POST" class="process-order-prolong">
    @csrf
    @auth('account')
    <h1>My Ordering Details</h1><br>
    <input type="hidden" name="project_name" id="" value="{{ $project->project_name }}">
    <label for="">Customer Name:</label>
    <input type="text" name="name" id="" value="{{Auth::guard('account')->user()->name}}"><br>
    @error('name')
    <span>Name is required!</span>
    @enderror
    <br>
    <label for="">Phone Number:</label>
    <input type="number" name="contact" id="" value="{{Auth::guard('account')->user()->username}}"><br>
    @error('contact')
    <span>Phone number is required!</span>
    @enderror
    <br>
    <button type="submit">Finish Up</button><br><br>
    @else
    <p>You need to login first! <a href="/login">Go To Login</a></p>
    @endauth
</form>
<br><br><br>
    </div>
<br><br><br><br>
    <button class="place-order-button" onclick="showOrderingForm()"><span style="color: orange;"><i class="fa fa-shopping-cart"></i> </span> Order Project</button>

    <button class="scrollToTopButton" onclick="scrollToTop()">&#8593;</button>

    
    <div class="footage-steady-foot">
    <div class="footer-steady">
    <img src="{{asset('assets/images/matrix-logo.png')}}" alt="Logo Picture"><br>
            <div class="social-media-panel">
                <a href="https://www.facebook.com/houseofmatrix" id="face-book-fab"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/houseofmatrix" id="twitter-fab"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/houseofmatrix" id="youtube-fab"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/houseofmatrix" id="ig-fab"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/+255710066540" id="tsap-fab"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    <p>Copyright &copy; <span class="currentDate"></span> House of Matrix. All Right Reserved.</p><div class="media-query"><br><br></div>
</div>


    <script>
        function scrollToTop(){
            window.scrollTo({
                top:0,
                behavior: 'smooth',
            });
        }

        function showOrderingForm(){
            document.querySelector('.process-order-prolong').classList.toggle('active');
        }
    </script>
</center>

@endsection
