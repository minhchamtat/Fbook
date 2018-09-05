@for ($i = 1; $i <= 3; $i++)
    <div class="product-total-2">
        <div class="single-most-product bd mb-18">
            <div class="most-product-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '20.jpg') }}" alt="book" /></a>
            </div>
            <div class="most-product-content">
                <div class="product-rating">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                </div>
                <h4><a href="#">Endeavor Daytrip</a></h4>
            </div>
        </div>
        <div class="single-most-product bd mb-18">
            <div class="most-product-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '21.jpg') }}" alt="book" /></a>
            </div>
            <div class="most-product-content">
                <div class="product-rating">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                </div>
                <h4><a href="#">Savvy Shoulder Tote</a></h4>
            </div>
        </div>
        <div class="single-most-product">
            <div class="most-product-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '22.jpg') }}" alt="book" /></a>
            </div>
            <div class="most-product-content">
                <div class="product-rating">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                </div>
                <h4><a href="#">Compete Track Tote</a></h4>
            </div>
        </div>
    </div>
@endfor
