@extends('admin.admin-layout')

@section('content')
<br><br><br>

@include('partials.admin-side-menu')

@include('partials.admin-mobile-viewside')
<center>
<div class="business-dashboard-main">
    <div class="head-component-wrapp">
        {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
        <h1>Customer Feedbacks <span class="layout-head">/ {{ Auth::guard('web')->user()->name }}</span></h1>
        {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
        @endif --}}
        <br>
    </div><br>
    <div class="user-feedbacks-complex-account">
        <div class="scrollable-scroll">
            @if (count($feedbacks) == 0)
            <p>No feedbacks sent here!</p>
            @else

            <table>
                <tr>
                    <th>Comment/Message</th>
                    <th>Created At</th>
                    
                </tr>
                @foreach ($feedbacks as $feedback)
                    <td>
                        {{ $feedback->message }}
                    </td>
                    
                    <td>
                        {{ $feedback->created_at }}
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
        <div class="paginate-builder-complex">
            {{ $feedbacks->links() }}
        </div>
    </div>
</div>

</center>

@endsection
