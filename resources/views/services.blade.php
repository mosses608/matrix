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
            margin: 20px 0;
            /* Space between the projects container and the button */
            text-align: center;
        }

        #load-more {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            /* Adjust color as needed */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #load-more:hover {
            background-color: #0056b3;
            /* Adjust hover color as needed */
        }


        /* Mobile view styling */
        @media (max-width: 767px) {

            .content,
            .container-fluid {
                margin-left: 0;
                /* Remove left margin */
                width: 100%;
                /* Keep full width */
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Center items */
            }
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
        <div style="background-color: #17345b;" class="header">
            <div class="header-left">
                <a href="index.html" class="logo"><img src="{{asset('assets/img/matrix-logo.png')}}" alt="Logo"></a>
                <a style="color: #fff" href="index.html" class="logo logo-small">
                    <!--<img src="assets/img/logo-small.png" alt="Logo" width="30"
                        height="30">-->MTX
                </a>
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
                                    <!--<a href="javascript:void(0)" class="d-block menu-style text-white">
                                        <div class="user-avatar d-inline-block mr-3">
                                            
                                        </div>
                                    </a>-->
                                    <img style="width: 100%; height: 100%;"
                                        src="{{asset('assets/img/matrix-logo.png')}}" alt="user avatar">
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
                                <a href="/news"><img src="assets/img/company.svg" alt="sidebar_img"> <span>
                                        News</span></a>
                            </li>
                            <li>
                                <a href="/about"><img src="assets/img/calendar.svg" alt="sidebar_img">
                                    <span>About Us</span></a>
                            </li>
                            <li>
                                <a href="/login"><img src="assets/img/leave.svg" alt="sidebar_img">
                                    <span>Log In</span></a>
                            </li>
                            <li>
                                <a href=""><img src="assets/img/review.svg" alt="sidebar_img"><span>Services</span></a>
                            </li>
                            <!--<li>
                                <a href=""><img src="assets/img/report.svg"
                                        alt="sidebar_img"><span>Feedback</span></a>
                            </li>-->
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

                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="row centered-ajax-component-loader" id="projects-container">
                    @foreach ($services as $service)
                    <div class="col-xl-3 d-flex" style="padding: 5px;">
                        
                            <div style="background-color: hsl(0, 0%, 100%); width: 100%; padding: 10px;">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    @if($service->serviceImage)
                                        <img src="{{ asset('storage/' . $service->serviceImage) }}"
                                            alt="{{ $service->serviceName }}" style="width: 100%; height: 300px;">
                                    @else
                                        No Image
                                    @endif
                                </div>

                                <h6 style="margin-top: 10px;">Service Name: {{ $service->serviceName }}</h6>
                                <p 
                                style="width: 100%; word-wrap: break-word; word-break: break-word; cursor: pointer;" 
                                onclick="showFullDescription(this)" 
                                data-full-description="{{ $service->serviceDESC }}" 
                                title="{{ strlen($service->serviceDESC) > 50 ? substr($service->serviceDESC, 0, 50) . '...' : $service->serviceDESC }}">
                                {{ strlen($service->serviceDESC) > 50 ? substr($service->serviceDESC, 0, 50) . '...' : $service->serviceDESC }}
                            </p>
                            <a href="/detailed-service/{{ $service->id }}">see more</a>
                            </div>
                      
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
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
    function showFullDescription(element) {
        var fullDescription = element.getAttribute('data-full-description');
        var popup = document.createElement('div');
        
        // Styling for the popup
        popup.style.position = 'fixed';
        popup.style.left = '50%';
        popup.style.top = '50%';
        popup.style.transform = 'translate(-50%, -50%)';
        popup.style.maxWidth = '80%';  // Adjust as needed
        popup.style.width = '100%';   // Allows width to adjust dynamically
        popup.style.height = 'auto';  // Allows height to adjust dynamically
        popup.style.padding = '20px';
        popup.style.background = '#fff';
        popup.style.border = '1px solid #ccc';
        popup.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
        popup.style.zIndex = '1000';
        popup.style.overflow = 'auto'; // Ensure overflow is handled
        
        // Content and Close button
        popup.innerHTML = `
            <p style="margin: 0; word-wrap: break-word;">${fullDescription}</p>
            <button onclick="this.parentElement.remove()" style="display: block; margin-top: 10px;">Close</button>
        `;
        
        document.body.appendChild(popup);
    }
    </script>
    
    
</body>

</html>