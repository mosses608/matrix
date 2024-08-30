
{{-- MOBILE VIEW SIDE MENU --}}
<div class="xxx-mobile-view-side-menu-navbars">
    <center>
        @if (Auth::guard('account')->user()->user_role == 'Business')
        <div class="profile-detailed-wrapper"><br>
            <img src="{{Auth::guard('account')->user()->profile ? asset('storage/' . Auth::guard('account')->user()->profile):asset('assets/images/profile.png')}}" alt="Profile">
            <span>{{ Auth::guard('account')->user()->business_name }}</span>
            <br>
        </div>
        @elseif(Auth::guard('account')->user()->user_role == 'Customer')
        <div class="profile-detailed-wrapper"><br>
            <img src="{{Auth::guard('account')->user()->profile ? asset('storage/' . Auth::guard('account')->user()->profile):asset('assets/images/profile.png')}}" alt="Profile">
            <span>{{ Auth::guard('account')->user()->customer_name }}</span>
            <br>
        </div>
        @endif
    </center>
    <br>
    <form action="/business/my-posts" method="GET" class="filter-posted-products-mobile">
        @csrf
        <input type="text" name="search" id="" class="search-field-inp" placeholder="Search......"><button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <br>
    <div class="home-view-side-mobile">
        <i class="fa fa-home"></i> <span><a href="/main-dashboard">Dashboard</a></span>
    </div>
    @if (Auth::guard('account')->user()->user_role == 'Business')
    <div class="profile-view-side-mobile" onclick="showHiddenProfileMenuMobile()">
        <i class="fa fa-user"></i> <span><a href="#">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="mini-profile-link-mobile">
        <a href="#"><i class="fa fa-angle-right"></i> View Profile</a>
    </div>
    <div class="product-mgt-side-mobile" onclick="showHiddenProductLinkMobile()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>Manage Product <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side-mobile">
        <a href="#"><i class="fa fa-angle-right"></i> Add Product</a>
        <a href="#"><i class="fa fa-angle-right"></i> View Product</a>
    </div>
    <div class="feedbacks-view-side-mobile" onclick="showHiddenFeedbackMobile()">
        <i class="fa fa-comments"></i> <span><a href="#">Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="feedback-mini-side-mobile">
        <a href="/business/view-feedbacks"><i class="fa fa-angle-right"></i> View Feedbacks</a>
    </div>
    <div class="invalidate-view-side-mobile">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div>
    @elseif(Auth::guard('account')->user()->user_role == 'Customer')

    <div class="profile-view-side-mobile" onclick="showHiddenProfileMenuMobile()">
        <i class="fa fa-user"></i> <span><a href="#">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="mini-profile-link-mobile">
        <a href="/personal-profile"><i class="fa fa-angle-right"></i> View Profile</a>
    </div>
    <div class="product-mgt-side-mobile" onclick="showHiddenProductLinkMobile()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>My Orders <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side-mobile">
        <a href="/my-orders"><i class="fa fa-angle-right"></i> View Orders</a>
        {{-- <a href="#"><i class="fa fa-angle-right"></i> View Product</a> --}}
    </div>
    <div class="feedbacks-view-side-mobile" onclick="showHiddenFeedbackMobile()">
        <i class="fa fa-comments"></i> <span><a href="#">Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="feedback-mini-side-mobile">
        <a href="/feedbacks"><i class="fa fa-angle-right"></i> Send Feedbacks</a>
    </div>
    <div class="invalidate-view-side-mobile">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div>
    @endif

</div>

<script>
    function showHiddenProfileMenuMobile(){
        document.querySelector('.mini-profile-link-mobile').classList.toggle('active');
    }
    function showHiddenProductLinkMobile(){
        document.querySelector('.product-mg-mini-side-mobile').classList.toggle('active');
    }
    function showHiddenFeedbackMobile(){
        document.querySelector('.feedback-mini-side-mobile').classList.toggle('active');
    }

    function showSideMenuOnMobile(){
        document.querySelector('.xxx-mobile-view-side-menu-navbars').classList.toggle('active');
    }
</script>

