@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<x-feedback_message />

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>Feedbacks / {{ Auth::guard('account')->user()->customer_name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        <form action="/feedbacks" method="POST" class="feedbacks-user-poster-ajax">
            @csrf
            <label for="">Feedbacks on Delivery</label>
            <select name="delivery_feed" id="">
                <option value="//">Select</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Average">Average</option>
            </select><br><br>
            <label for="">Quality of Services</label>
            <select name="quality_feed" id="">
                <option value="//">Select</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Average">Average</option>
            </select><br><br>
            <label for="">Overall Rating</label>
            <select name="rate_feed" id="">
                <option value="//">Select</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Average">Average</option>
            </select><br><br>
            <label for="">Feedback in Message <strong>(Optional)</strong></label>
            <textarea name="message" id=""></textarea><br><br><br id="line-braekin">
            <button type="submit">Submit</button><br><br>
        </form>
    </div>
</center>

@endsection
