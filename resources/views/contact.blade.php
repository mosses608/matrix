@extends('layout')

@section('content')
<br><br><br>

<center>
    <div class="centered-ajax-bosy-wrapper">
        <div class="min-sub-main-component">
            <!-- <button class="toggle-view-mobile-viewer-wrapper" onclick="showSideMenusMobile()">&#9776;</button> -->
        </div>
        <div class="centered-ajax-loader-about">
            <h1>Contact Us</h1><br>
            <div class="contact-lzy-position">
                <div class="right-side-position-log">
                <a href="https://www.facebook.com/House of Matrix" id="face-book-fab"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/@houseofmatrixtz" id="twitter-fab"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/@HouseofMatrix-bc6xr" id="youtube-fab"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/houseofmatrix" id="ig-fab"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/+255742582428" id="tsap-fab"><i class="fab fa-whatsapp"></i></a><br><br>
                <div class="descrpt-class">
                    <h2><i class="fas fa-phone"></i> Phone Number 1: +255 742 582 428</h2>
                    <h2><i class="fas fa-phone"></i> Phone Number 2: +255 767 857 198</h2>
                    <h2><i class="fa fa-map-marker" style="color:#0000FF;"></i> Address: Mbeya, Iyunga</h2>
                    <h2><i class="fa fa-clock"></i> Officer Hours: 07:00 AM - 08:30 PM</h2>
                </div>
                </div>
            </div>
        </div>
    
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
    </script>

    <script>
        const autoChanger=document.querySelectorAll('.scrollable-component-container .notified-wrapper-ajax');
        const intervalTime=8000;
        let initialComponent=0;

        function showNextContent(){
            autoChanger[initialComponent].style.display='none';
            initialComponent++;

            if(initialComponent>=autoChanger.length){
                initialComponent=0;
            }

            autoChanger[initialComponent].style.display='block';
        }

        setInterval(showNextContent,intervalTime);
    </script>
</center>

@endsection
