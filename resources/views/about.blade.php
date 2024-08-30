@extends('layout')

@section('content')
<br><br><br>

<center>
    <div class="centered-ajax-bosy-wrapper">
        <div class="min-sub-main-component">
            <!-- <button class="toggle-view-mobile-viewer-wrapper" onclick="showSideMenusMobile()">&#9776;</button> -->
        </div>
        <div class="centered-ajax-loader-about">
            <center><h1>About Us</h1></center>
            <div class="centered-ajax0parag">
                <p><strong>Hous of Matrix</strong> is a Technological Organization which was established in November 2022 in Mbeya, Tanzani. e aimed at creating communityscience family with people who are passionate and depply engage with Technology and innovation with Electronics</p>
                <p><strong>House of Matrix</strong> mostly based on the Technology innovation and we offer the following services:</p>
                <p>
                <ul>
                    <li><i class="fa fa-check"></i> Incubator Design</li><br>
                    <li><i class="fa fa-check"></i> Circuit Design and Prototyping</li><br>
                    <li><i class="fa fa-check"></i> Proteus and Matlab Simulation</li><br>
                    <li><i class="fa fa-check"></i> Camera and Electrical Fence Installation</li><br>
                    <li><i class="fa fa-check"></i> Software Design and Web Application Development</li><br>
                    <li><i class="fa fa-check"></i> Electrical and Electronics Lab Srvices</li><br>
                    <li><i class="fa fa-check"></i> Micro-controller programming such as Arduino, Esp and Pic</li><br>
                    <li><i class="fa fa-check"></i> Computer Servicing and Windows Installation</li><br>
                    <li><i class="fa fa-check"></i> Selling Electrical and Electronics Components</li><br>
                    <li><i class="fa fa-check"></i> Mechanical Design of Materials</li><br>
                    <li><i class="fa fa-check"></i> Solar Backup installation</li><br>
                    <li><i class="fa fa-check"></i> Wiring, Electrical installation and Automation</li><br>
                </ul>
                </p>
                <p>We have our own workshops for Electrical, Electronics and Mechnical which offer all services based on the field</p>
                <p>Also we have Electrical and Electronics store which offer different Electronics Materials for Automation, Artificial Intelligence and Internet of Things. They include Micro-controller</p>
                <ul>
                    <li><i class="fa fa-check"></i> Arduino Uno</li><br>
                    <li><i class="fa fa-check"></i> Rasberry Pi</li><br>
                    <li><i class="fa fa-check"></i> ESP Controller</li><br>
                    <li><i class="fa fa-check"></i> PIC Controller</li><br>
                    <li><i class="fa fa-check"></i> Different Sensor like Utrasonic</li><br>
                    <li><i class="fa fa-check"></i> Wiring Material like cables, Bulb, Solar etc</li><br>
                </ul>
                <p>We as <strong>House of Matrix (HOM)</strong>, the community science family we belive that, in Technology nothing is impossible, lets do it.</p>
            </div>
        </div>
    
    <button class="scrollToTopButton" onclick="scrollToTop()">&#8593;</button>

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
