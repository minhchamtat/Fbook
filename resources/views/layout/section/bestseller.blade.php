@for ($i = 1; $i <= 3; $i ++)
    <div class="bestseller-total">
        <div class="single-bestseller mb-25">
            <div class="bestseller-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '15.jpg') }}" alt="book" /></a>
                <div class="product-flag">
                    <ul>
                        <li><span class="sale">new</span></li>
                    </ul>
                </div>
            </div>
            <div class="bestseller-text text-center">
                <h3> <a href="#">Voyage Yoga Bag</a></h3>
            </div>
        </div>
        <div class="single-bestseller">
            <div class="bestseller-img">
                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '16.jpg') }}" alt="book" /></a>
                <div class="product-flag">
                    <ul>
                        <li><span class="sale">new</span></li>
                    </ul>
                </div>
            </div>
            <div class="bestseller-text text-center">
                <h3> <a href="#">Compete Track Tote</a></h3>
            </div>
        </div>
    </div>
@endfor
