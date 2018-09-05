@for ($i = 1; $i <= 3; $i++)
    <div class="col-lg-12">
        <div class="single-post">
            <div class="post-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.post') . '1.jpg') }}" alt="post" /></a>
                <div class="blog-date-time">
                    <span class="day-time">06</span>
                    <span class="moth-time">Dec</span>
                </div>
            </div>
            <div class="post-content">
                <h3><a href="#">Nam tincidunt vulputate felis</a></h3>
                <span class="meta-author"> Demo Posthemes </span>
                <p>Discover five of our favourite dresses from our new collection that are destined to be worn and loved immediately.</p>
            </div>
        </div>
    </div>
@endfor
