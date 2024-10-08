<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>House | of | Matrix | Home | Page</title>
    <!--<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">-->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

        <style>
            #load-more-container {
    margin: 20px 0; /* Space between the projects container and the button */
    text-align: center;
}

#load-more {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff; /* Adjust color as needed */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#load-more:hover {
    background-color: #0056b3; /* Adjust hover color as needed */
}


/* Mobile view styling */
@media (max-width: 767px) {
    .content, .container-fluid {
        margin-left: 0; /* Remove left margin */
        width: 100%; /* Keep full width */
        display: flex;
        flex-direction: column;
        align-items: center; /* Center items */
    }
}

.content {
            text-align: center;
        }

/* Popup styles */
.popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .popup {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        .close-btn {
            background-color: #ff5c5c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #ff3c3c;
        }

        .open-btn {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .open-btn:hover {
            background-color: #006994;
        }

        .process-order-prolong {
    position: fixed;
    animation: slidingSlow 1s forwards;
    left: 30%;
    top: 30%;
    display: none;
    width: 45%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 10px;
    border-radius: 4px;
    background-color: #555;
}

.process-order-prolong h1 {
    text-transform: uppercase;
    color: #ffffff;
    float: left;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.process-order-prolong label {
    float: left;
    padding: 4px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    color: #ffffff;
}

.process-order-prolong input {
    width: 70%;
    padding: 6px;
    float: right;
    border: none;
    font-size: 14px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    border-radius: 4px;
}

.process-order-prolong button {
    float: right;
    padding: 6px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: green;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    width: 120px;
    font-size: 14px;
    cursor: pointer;
}
.process-order-prolong span {
    color: red;
    font-size: 10px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    font-style: italic;
}

.process-order-prolong p{
    color: #FFFFFF;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
.process-order-prolong p a{
    color: orange;
    font-style: italic;
    text-decoration: underline;
}

.process-order-prolong {
        width: 90%;
        left: 5%;
    }
    .process-order-prolong input {
        width: 98%;
        float: none;
    }

    .process-order-prolong labe {
        font-size: 14px;
    }

    .place-order-button {
    background-color: #0000ff;
    color: #ffffff;
    width: 200px;
    height: 40px;
    box-shadow: 0 0 2px #0000ff;
    border: none;
    border-radius: 40px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    cursor: pointer;
    text-transform: uppercase;
    margin-bottom: 7%;
}
.place-order-button:hover {
    color: orange;
}
        </style>

</head>

<body>
    <div class="main-wrapper">
        <div style="background-color: #17345b;" class="header">
            <div class="header-left">
                <a href="index.html" class="logo"><img src="{{asset('assets/img/matrix-logo.png')}}" alt="Logo"></a>
                <a style="color: #fff" href="index.html" class="logo logo-small"><!--<img src="assets/img/logo-small.png" alt="Logo" width="30"
                        height="30">-->MTX</a>
                <a href="javascript:void(0);" id="toggle_btn"><span
                        class="bar-icon"><span></span><span></span><span></span></span></a>
            </div>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search project...">
                    <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn"><i class="fas fa-bars"></i></a>
            <!--<ul class="nav user-menu">
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link pr-0" data-toggle="dropdown"><i data-feather="bell"></i>
                        <span class="badge badge-pill"></span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All</a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar avatar-sm"><img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-02.jpg"></span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Brian Johnson</span>
                                                    paid the invoice <span class="noti-title">#DF65485</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar avatar-sm"><img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-03.jpg"></span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Marie Canales</span>
                                                    has accepted your estimate <span
                                                        class="noti-title">#GTR458789</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-primary-light"><i
                                                        class="far fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">New user
                                                        registered</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar avatar-sm"><img class="avatar-img rounded-circle" alt=""
                                                    src="assets/img/profiles/avatar-04.jpg"></span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Barbara Moore</span>
                                                    declined the invoice <span class="noti-title">#RDW026896</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-title rounded-circle bg-info-light"><i
                                                        class="far fa-comment"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">You have received a new
                                                        message</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>-->
                <!--<li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><span class="user-img"><img
                                src="assets/img/profile.jpg" alt=""><span
                                class="status online"></span></span><span>Kavin Hansen</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html"><i data-feather="user" class="mr-1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="mr-1"></i>
                            Settings</a>
                        <a class="dropdown-item" href="login.html"><i data-feather="log-out" class="mr-1"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>-->
            <div class="dropdown mobile-user-menu show">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right ">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-contents">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <div class="mobile-show">
                            <div class="offcanvas-menu">
                                <div class="user-info align-center bg-theme text-center">
                                    <span class="lnr lnr-cross  text-white" id="mobile_btn_close">X</span>
                                    <a href="javascript:void(0)" class="d-block menu-style text-white">
                                        <div class="user-avatar d-inline-block mr-3">
                                            <img src="{{asset('assets/img/matrix-logo.png')}}" alt="user avatar" 
                                                class="rounded-circle" width="50">
                                        </div>
                                        <p><!--assets/img/profiles/avatar-18.jpg--></p>
                                    </a>
                                </div>
                            </div>
                            <div class="sidebar-input">
                                <div class="top-nav-search">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li class="active">
                                <a href="/"><img src="assets/img/home.svg" alt="sidebar_img">
                                    <span>Home</span></a>
                            </li>
                            <li>
                                <a href="/order-components"><img src="assets/img/employee.svg" alt="sidebar_img"><span>
                                        Order Components</span></a>
                            </li>
                            <li>
                                <a href="company.html"><img src="assets/img/company.svg" alt="sidebar_img"> <span>
                                        News</span></a>
                            </li>
                            <li>
                                <a href="calendar.html"><img src="assets/img/calendar.svg" alt="sidebar_img">
                                    <span>About Us</span></a>
                            </li>
                            <li>
                                <a href="leave.html"><img src="assets/img/leave.svg" alt="sidebar_img">
                                    <span>Log In</span></a>
                            </li>
                            
                            <!--<li>
                                <a href="manage.html"><img src="assets/img/manage.svg" alt="sidebar_img">
                                    <span>Manage</span></a>
                            </li>-->
                            <!--<li>
                                <a href="settings.html"><img src="assets/img/settings.svg"
                                        alt="sidebar_img"><span>Settings</span></a>
                            </li>
                            <li>
                                <a href="profile.html"><img src="assets/img/profile.svg" alt="sidebar_img">
                                    <span>Profile</span></a>
                            </li>-->
                        </ul>
                        <ul class="logout">
                            <li>
                                <a href="profile.html"><img src="assets/img/logout.svg" alt="sidebar_img"><span>Log
                                        out</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <h5 style="text-align: center; font-size: 25px;">Components to Order</h5>

                
                <div class="ordered-components">

                    <div class="single-looped-component">
                        <div class="col-xl-6 d-flex" style="padding: 5px;"> <!-- Reduced padding for less space between columns -->
                            <div style="background-color: hsl(0, 0%, 100%); width: 100%; padding: 10px;">
                        <h6>{{$component->component_name}}</h6>
                        <img src="{{$component->component_picture ? asset('images/' . $component->component_picture): asset('assets/images/image.pbg')}}" alt="Image">
                        <h6>Price: {{$component->component_price}}</h6>
                        <!--<button onclick="showCartAdd()"><i class="fa fa-shopping-cart"></i> Order Component</button>-->
                        <div style="margin-top: 10px;" class="content">
                            <!--<h1>Welcome to the Page</h1>
                            <p>This is the main page content.</p>-->
                            <button class="open-btn" onclick="openPopup()"><i class="fa fa-shopping-cart"></i> Order Component</button>
                        </div>
                            </div>
                        </div>
                    </div>
            
                </div>

                <div class="row centered-ajax-component-loader" id="projects-container">
                    
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
                        
                </div>
                
            </div>
            
            <!-- Popup Overlay -->
            <div class="popup-overlay" id="popup-overlay">
                <div class="popup">
                    <h6>You need to login first!</h6>
                    <p>to Order this project.</p>
                    <button class="close-btn" onclick="closePopup()">Close</button>
                    <div style="margin-top: 5px;">
                        <a href="/login">Go To Login</a>
                    </div>
                </div>
                
            </div>

        </div>
    </div>

    
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/handlebars.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboardTemplate.js') }}"></script>

<script>
    document.getElementById('load-more')?.addEventListener('click', function() {
        const button = this;
        const nextPage = button.getAttribute('data-next-page');
        const totalPages = button.getAttribute('data-total-pages');

        if (parseInt(nextPage) > parseInt(totalPages)) {
            button.style.display = 'none'; // Hide button if no more pages
            return;
        }

        fetch(`?page=${nextPage}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newProjects = doc.querySelector('#projects-container').innerHTML;
                document.querySelector('#projects-container').innerHTML += newProjects;

                if (!doc.querySelector('#load-more')) {
                    button.style.display = 'none'; // Hide button if no more pages
                } else {
                    button.setAttribute('data-next-page', parseInt(nextPage) + 1);
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
    // Function to show the popup
     function openPopup() {
         document.getElementById('popup-overlay').style.display = 'flex';
     }
 
     // Function to hide the popup
     function closePopup() {
         document.getElementById('popup-overlay').style.display = 'none';
     }
 </script>

</body>

</html>