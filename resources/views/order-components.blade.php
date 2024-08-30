@extends('layout')

@section('content')
<br><br><br>

<x-logout_message />

<x-error_message />

<x-login_success_msg />

<x-feedback_sent />

<center>

    <div class="centered-ajax-bosy-wrapper">
       
        <div class="min-sub-main-component">
            <!-- <button class="toggle-view-mobile-viewer-wrapper" onclick="showSideMenusMobile()">&#9776;</button> -->
        </div>

    <div class="ordered-components">
        @foreach($components as $component)

        <div class="single-looped-component">
        <h1>{{$component->component_name}}</h1>
            <img src="{{$component->component_picture ? asset('images/' . $component->component_picture): asset('assets/images/image.pbg')}}" alt="Image">
            <h2>Price: {{$component->component_price}}</h2>
            <button><a href="/order-component/{{$component->id}}"><i class="fa fa-shopping-cart"></i> Order Component &#8594; </a></button>
        </div>

        @endforeach

        <div class="button-controller">
            <button class="prev" onclick="changeSlide(-1)">&#8592;</button>
            <button class="next" onclick="changeSlide(1)">&#8594;</button>
        </div>
    </div>
   
    <button class="scrollToTopButton" onclick="scrollToTop()">&#8593;</button>

    <div class="media-screener">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div><br>

    <div class="footage-steady-foot">
    <div class="footer-steady">
    <img src="{{asset('assets/images/matrix-logo.png')}}" alt="Logo Picture"><br>
            <div class="social-media-panel">
                <a href="https://www.facebook.com/House of Matrix" id="face-book-fab"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/@houseofmatrixtz" id="twitter-fab"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/@HouseofMatrix-bc6xr" id="youtube-fab"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/houseofmatrix" id="ig-fab"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/+255742582428" id="tsap-fab"><i class="fab fa-whatsapp"></i></a>
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
    </script>

    <script>
        const imageSlider=document.querySelectorAll('.ordered-components .single-looped-component');
        const intervalTime=4000;
        let initialSlider=0;

        function showNextSlider(){
            imageSlider[initialSlider].style.display='none';
            initialSlider++;

            if(initialSlider>=imageSlider.length){
                initialSlider=0;
            }
            imageSlider[initialSlider].style.display='block';
        }

        setInterval(showNextSlider,intervalTime);
    </script>

    <script>
        const imageChangerClick=document.querySelectorAll('.ordered-components .single-looped-component');
        let currentIndex=0;

        function showNextIndexSlider(index){
            imageChangerClick.foreact(function showNextIndexSlider(single_loop){
                single_loop.style.display='none';
            });
            imageChangerClick[index].style.display='block';
        }

        function changeSlide(offset){
            const newSlider=currentIndex + offset;

            if(newSlider<imageChangerClick.length){
                newSlider=imageChangerClick.length-1;
            }elseif(newSlider>=imageChangerClick.length){
                newSlider=0;
            }

            showNextIndexSlider(newSlider);

            newSlider=currentIndex;

        }

        showNextIndexSlider(currentIndex);
    </script>
</center>

@endsection
