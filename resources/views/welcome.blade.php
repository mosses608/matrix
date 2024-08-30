@extends('layout')

@section('content')
<br><br><br>

<x-logout_message />

<x-error_message />

<x-login_success_msg />

<x-feedback_sent />

<center>

    <div class="centered-ajax-bosy-wrapper">
        <div class="social-media-platform-wrapper">
            <a href="https://www.facebook.com/House of Matrix" id="face-book-fab"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com/@houseofmatrixtz" id="twitter-fab"><i class="fab fa-twitter"></i></a>
            <a href="https://youtube.com/@HouseofMatrix-bc6xr" target="_blank" id="youtube-fab"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/Houseofmatrixtz" id="ig-fab"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/+255742582428" id="tsap-fab"><i class="fab fa-whatsapp"></i></a>
        </div>
        <form action="/" method="GET" class="search-itmes-loaded">
            @csrf
            <input type="text" name="search" id="" placeholder="Searh projects here........." class="search-filter">
            <button type="submit"><i class="fa fa-search"></i> <span id="search-item">Search</span></button>
        </form>

        <script>
            const formSearch=document.querySelector('.search-itmes-loaded');
            const searchInput=document.querySelector('.search-filter');

            formSearch.addEventListener('submit', function(e){
                e.preventDefault();
                const searchInputValue = searchInput.value;
                if(searchInputValue===""){
                    alert('You can not search an empty thing!');
                }
            })
        </script>

        <div class="min-sub-main-component">
            <button class="toggle-view-mobile-viewer-wrapper" onclick="showSideMenusMobile()">&#9776;</button>
        </div>
    </div><div id="line-breaker-line"><br><br></div>
    <div class="centered-ajax-component-loader">
        <h2><span>Posted Projects</span> | <a href="#">View All</a></h2><br><br>
        @if(count($projects) == 0)
        <p>No project availlable here!</p>
        @endif
        @foreach ($projects as $project)
        <div class="items-loaded-viewer">
            <div class="video-builder-holder">
                <video src="{{ $project->project_video ? asset('storage/' . $project->project_video): asset('assets/videos/project_vide.mp4') }}" controls loop width="720" height="360" muted autoplay></video>
            </div>
            <h1>{{ $project->project_name }}</h1><br><br>
            <div class="footer-component-clon">
                <button class="more-readbale-view"><a href="/admin/read-more/{{ $project->id }}">Read More &#8594;</a></button>
                <p>Posted on: {{ $project->created_at }}</p>
            </div><br><br>
        </div>
        @endforeach
        {{-- <div class="paginate-builder-complex">
            {{ $projects->links() }}
        </div> --}}
    </div>
    <div class="news-boarder-builder-selector">
        <h2><span>Posted News</span> | <a href="#">View All</a></h2><br><br>
        <div class="scrollable-component-container">
            @foreach ($notifications as $notify)
            <section class="notified-wrapper-ajax">
            <h3>Title: {{ $notify->news_title }}</h3>
            @if ($notify->news_picture !="")
            <div class="non-empty-picture">
                <img src="{{ $notify->news_picture ? asset('storage/' . $notify->news_picture): asset('assets/images/profile.jpg') }}" alt="News Picture">
            </div>
                <p>{{ $notify->description }} <em>Posted on {{ $notify->created_at }}</em></p>
            @endif
            </section>
            @endforeach
        </div>
    </div>
    <button class="scrollToTopButton" onclick="scrollToTop()">&#8593;</button>

    <div class="media-screener">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div><br>
    <form action="/feedback" method="POST" class="comment-users-commente">
        @csrf
        <input type="text" name="message" placeholder="Tell us your comments on our services"><button type="submit"><i class="fa fa-paper-plane"></i></button>
    </form>
        <br><br>
    <div class="footage-steady-foot">
    <div class="footer-steady">
    <img src="{{asset('assets/images/matrix-logo.png')}}" alt="Logo Picture"><br>
            <div class="social-media-panel">
                <a href="https://www.facebook.com/House of Matrix" id="face-book-fab"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/@houseofmatrixtz" id="twitter-fab"><i class="fab fa-twitter"></i></a>
                <a href="https://youtube.com/@HouseofMatrix-bc6xr" id="youtube-fab"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/Houseofmatrixtz" id="ig-fab"><i class="fab fa-instagram"></i></a>
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
