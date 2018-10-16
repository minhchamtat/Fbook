<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider pt-125 pb-130 bg-img" style="background-image:url({{ asset(config('view.image_paths.slide') . '1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="slider-content slider-animated-1 text-center">
                            <h1>Fbook</h1>
                            <h3>PHP Education</h3>
                            <a href="{{ route('books.create') }}">Create book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-h1-2 pt-215 pb-100 bg-img" style="background-image:url({{ asset(config('view.image_paths.slide') . '2.jpg') }});">
            <div class="container">
                <div class="slider-content slider-content-2 slider-animated-1">
                    <h1>We make it awesome!</h1>
                    <h2>Framgia</h2>
                    <a href="{{ route('books.create') }}">Create book</a>
                </div>
            </div>
        </div>
    </div>
</div>
