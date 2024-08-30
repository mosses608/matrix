@extends('main-layout')


@section('content')
<br><br><br>

@include('partials.main-side-menu')

@include('partials.mobile-view-side')

<center>
    <div class="business-dashboard-main">
        <div class="head-component-wrapp">
            {{-- @if (Auth::guard('account')->user()->user_role == 'Business') --}}
            <h1>View Feedbacks / {{ Auth::guard('account')->user()->business_name }}</h1>
            {{-- @elseif(Auth::guard('account')->user()->user_role == 'Customer')
            <h1>Customer Dashboard / {{ Auth::guard('account')->user()->customer_name }}</h1>
            @endif --}}
            <br>
        </div>
        <br>
        <div class="user-feedbacks-complex-account">
            <div class="scrollable-scroll">
                <table>
                    <tr>
                        <th>Sno</th>
                        <th>Delivery</th>
                        <th>Quality of Service</th>
                        <th>Overall</th>
                        <th>Reg. Date</th>
                    </tr>
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>
                            {{ $feedback->id }}
                        </td>
                        <td>
                            {{ $feedback->delivery_feed }}
                        </td>
                        <td>
                            {{ $feedback->quality_feed }}
                        </td>
                        <td>
                            {{ $feedback->rate_feed }}
                        </td>
                        <td>
                            {{ $feedback->created_at }}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="paginate-builder-complex">
                {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
</center>
@endsection
