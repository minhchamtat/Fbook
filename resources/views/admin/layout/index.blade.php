@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="content">
            <div class="img">
                <img src="{{ asset(config('view.image_paths.slide') . '1.jpg') }}" alt="">
                <div class="text">
                    <h2>Framgia</h2>
                    <h3>We make it awesome!</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
