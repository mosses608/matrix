<div class="main-side-menu-navbars">
    <div class="home-view-side">
        <i class="fa fa-home"></i> <span><a href="/main-dashboard">Dashboard</a></span>
    </div>
    @if (Auth::guard('account')->user()->user_role == 'Business')
    <div class="profile-view-side" onclick="showHiddenProfileMenu()">
        <i class="fa fa-user"></i> <span><a href="#">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="mini-profile-link">
        <a href="/business/business-profile"><i class="fa fa-angle-right"></i> View Profile</a>
    </div>
    <div class="product-mgt-side" onclick="showHiddenProductLink()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>Manage Product <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side">
        <a href="/business/add-product"><i class="fa fa-angle-right"></i> Add Product</a>
        <a href="/business/my-posts"><i class="fa fa-angle-right"></i> View Product</a>
    </div>
    <div class="feedbacks-view-side" onclick="showHiddenFeedback()">
        <i class="fa fa-comments"></i> <span><a href="#">Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="feedback-mini-side">
        <a href="/business/view-feedbacks"><i class="fa fa-angle-right"></i> View Feedbacks</a>
    </div>
    <div class="invalidate-view-side">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div>
    @elseif(Auth::guard('account')->user()->user_role == 'Customer')
    <div class="profile-view-side" onclick="showHiddenProfileMenu()">
        <i class="fa fa-user"></i> <span><a href="#">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="mini-profile-link">
        <a href="/personal-profile"><i class="fa fa-angle-right"></i> View Profile</a>
    </div>
    <div class="product-mgt-side" onclick="showHiddenProductLink()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>My Orders <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side">
        <a href="/my-orders"><i class="fa fa-angle-right"></i> View Orders</a>
        {{-- <a href="#"><i class="fa fa-angle-right"></i> View Product</a> --}}
    </div>
    <div class="feedbacks-view-side" onclick="showHiddenFeedback()">
        <i class="fa fa-comments"></i> <span><a href="#">Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="feedback-mini-side">
        <a href="/feedbacks"><i class="fa fa-angle-right"></i> Send Feedbacks</a>
    </div>
    <div class="invalidate-view-side">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div>
    @endif

</div>


<script>
    function showHiddenProfileMenu(){
        document.querySelector('.mini-profile-link').classList.toggle('active');
    }

    function showHiddenProductLink(){
        document.querySelector('.product-mg-mini-side').classList.toggle('active');
    }

    function showHiddenFeedback(){
        document.querySelector('.feedback-mini-side').classList.toggle('active');
    }
</script>
