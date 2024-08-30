@extends('layout')

@section('content')
<br><br><br>

<x-logout_message />

<x-error_message />

<x-login_success_msg />

<x-feedback_sent />

<x-component_order_msg />

<center>

    <div class="centered-ajax-bosy-wrapper">
       
        <div class="min-sub-main-component">
            <!-- <button class="toggle-view-mobile-viewer-wrapper" onclick="showSideMenusMobile()">&#9776;</button> -->
        </div>

    <div class="ordered-components">

        <div class="single-looped-component">
            <h1>{{$component->component_name}}</h1>
            <img src="{{$component->component_picture ? asset('images/' . $component->component_picture): asset('assets/images/image.pbg')}}" alt="Image">
            <h2>Price: {{$component->component_price}}</h2>
            <button onclick="showCartAdd()"><i class="fa fa-shopping-cart"></i> Order Component</button>
        </div>

    </div>
   
    <button class="scrollToTopButton" onclick="scrollToTop()">&#8593;</button>

    <form action="/comporders" method="POST" class="process-order-prolong">
    @auth('account')
        @csrf
        <label for="">Quantity:</label>
        <input type="number" name="quantity" id="" class="quantity_component"><br><br>
        <label for="">Phone Number:</label>
        <input type="number" name="contact" id="" value="{{Auth::guard('account')->user()->username}}"><br><br>
        <label for="">Component Name:</label>
        <input type="text" name="component_name" id="" value="{{$component->component_name}}"><br><br>
        <label for="">Component Price</label>
        <input type="text" name="price" id="" value="{{$component->component_price}}" class="price_component"><br><br>
        <label for="">Total Price:</label>
        <input type="number" name="total_price" id="" class="total_price"><br><br>
        <button type="submit">Order</button><br><br>
    @else
        <p>You need to login first! <a href="/login">Go To Login</a></p>
    @endauth
    </form>
    
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

        function showCartAdd(){
            document.querySelector('.process-order-prolong').classList.toggle('active');
        }

        document.querySelector('.quantity_component').addEventListener('change', function(){
            const value_quantity=document.querySelector('.quantity_component').value;
            const value_price=document.querySelector('.price_component').value;

            const total_price=document.querySelector('.total_price');

            total_price.textContent=value_quantity*value_price;

            total_price.value=value_quantity*value_price;
        });
    </script>

</center>

@endsection
