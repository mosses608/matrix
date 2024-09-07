<div id="projects-container">
    @foreach ($projects as $project)
    <div class="col-xl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="video-builder-holder">
                    <video 
                        style="width: 100%; height: 350px;"
                        src="{{ $project->project_video ? asset('storage/' . $project->project_video) : asset('assets/videos/project_video.mp4') }}" 
                        controls 
                        loop 
                        muted 
                        autoplay
                    ></video>
                    <h6 style="margin-top: 10px;">{{ $project->project_name }}</h6>
                    <div style="margin-top: 10px;" class="footer-component-clon">
                        <button style="background-color: #0000FF; border: none; height: 40px; border-radius: 10px;" class="more-readable-view">
                            <a style="color: #fff;" href="/admin/read-more/{{ $project->id }}">Read More &#8594;</a>
                        </button>
                        <p style="margin-top: 10px;">Posted on: {{ $project->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
