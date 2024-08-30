<div class="main-side-menu-navbars">


    <div class="home-view-side">
        <i class="fa fa-home"></i> <span><a href="/admin/admin-dashboard">Dashboard</a></span>
    </div>

    <div class="profile-view-side" onclick="showHiddenProfileMenu()">
        <i class="fa fa-user"></i> <span><a href="#">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="mini-profile-link">
        <a href="/admin/my-profile"><i class="fa fa-angle-right"></i> View Profile</a>
    </div>
    <div class="product-mgt-side" onclick="showHiddenProductLink()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>Manage Projects <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side">
        <a href="/admin/add-project"><i class="fa fa-angle-right"></i> Add Project</a>
        <a href="/admin/projects"><i class="fa fa-angle-right"></i> View Projects</a>
        <a href="/admin/add-component"><i class="fa fa-angle-right"></i> Add Components</a>
        <a href="/admin/view-components"><i class="fa fa-angle-right"></i> View Components</a>
    </div>
    <div class="feedbacks-view-side" onclick="showHiddenFeedback()">
        <i class="fa fa-comments"></i> <span><a href="#">News & Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div>
    <div class="feedback-mini-side">
        <a href="/admin/feedbacks"><i class="fa fa-angle-right"></i> View Feedbacks</a>
        <a href="/admin/news"><i class="fa fa-angle-right"></i> Post News</a>
    </div>
    <div class="invalidate-view-side">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div>






    {{-- <div class="home-view-side">
        <i class="fa fa-home"></i> <span><a href="/admin/admin-dashboard">Dashboard</a></span>
    </div>
    <div class="profile-view-side" onclick="showHiddenProfileMenu()">
        <i class="fa fa-user"></i> <span><a href="/admin/my-profile">My Profile <i class="fa fa-angle-down"></i></a></span>
    </div> --}}
    {{-- <div class="mini-profile-link">
        <a href="/admin/my-profile"><i class="fa fa-angle-right"></i> View Profile</a>
    </div> --}}
    {{-- <div class="product-mgt-side" onclick="showHiddenProductLink()">
        <i class="fa fa-product-hunt"></i> <span><a href="#"></a>Manage Product <i class="fa fa-angle-down"></i></span>
    </div>
    <div class="product-mg-mini-side">
        <a href="/business/add-product"><i class="fa fa-angle-right"></i> Add Product</a>
        <a href="/business/my-posts"><i class="fa fa-angle-right"></i> View Product</a>
    </div> --}}


    {{-- <div class="feedbacks-view-side" onclick="showHiddenFeedback()">
        <i class="fa fa-comments"></i> <span><a href="/admin/feedbacks">Feedbacks <i class="fa fa-angle-down"></i></a></span>
    </div> --}}


    {{-- <div class="feedback-mini-side">
        <a href="/business/view-feedbacks"><i class="fa fa-angle-right"></i> View Feedbacks</a>
    </div> --}}
    {{-- <div class="invalidate-view-side">
        <form action="/logout" method="POST" class="logout-form-prod">
            @csrf
            <button type="submit"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
        </form>
    </div> --}}

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
