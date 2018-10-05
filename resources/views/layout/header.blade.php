<header>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="language-area">
                        <ul>
                            <li><img src="{{ asset(config('view.image_paths.flag') . '1.jpg') }}" alt="flag" /><a href="#">English<i class="fa fa-angle-down"></i></a>
                                <div class="header-sub">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset(config('view.image_paths.flag') . '2.jpg') }}" alt="flag" />france</a></li>
                                        <li><a href="#"><img src="{{ asset(config('view.image_paths.flag') . '3.jpg') }}" alt="flag" />croatia</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-area text-right">
                        <ul>
                            @auth
                                <li>
                                    <div class="dropdown">
                                        <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::user()->avatar)
                                                <img src="{{ asset(config('view.image_paths.user') . Auth::user()->avatar) }}" alt="avatar" class="avatar">
                                            @else
                                                <img src="{{ asset(config('view.image_paths.user') . '1.png') }}" alt="avatar" class="avatar">
                                            @endif
                                        </span>
                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><b>{{ Auth::user()->name }}</b></a>
                                            <a class="dropdown-item" href="{{ route('my-profile') }}">Profile</a>
                                            <a class="dropdown-item" href="#">Book of me</a>
                                            <a class="dropdown-item" href="#">Book request</a>
                                            {!! Form::open([
                                                'route' => 'logout',
                                                'method' => 'POST',
                                            ]) !!}
                                            <button class="btn btn-dangera">Log out</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Log in</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="header-search">
                        <form action="#">
                            <input type="text" placeholder="Search entire store here..." />
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="#"><img src="{{ asset(config('view.image_paths.logo') . 'logo.png') }}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="my-cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i>My Request</a>
                                <span>2</span>
                                <div class="mini-cart-sub">
                                    <div class="cart-product">
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '1.jpg') }}" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Joust Duffle Bag</a></h5>
                                                <p>1 x £60.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-cart">
                                            <div class="cart-img">
                                                <a href="#"><img src="{{ asset(config('view.image_paths.product') . '3.jpg') }}" alt="book" /></a>
                                            </div>
                                            <div class="cart-info">
                                                <h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
                                                <p>1 x £52.00</p>
                                            </div>
                                            <div class="cart-icon">
                                                <a href="#"><i class="fa fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-totals">
                                        <h5>Total <span>£12.00</span></h5>
                                    </div>
                                    <div class="cart-bottom">
                                        <a class="view-cart" href="#">view</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="active"><a href="#">Home<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu">
                                        <ul>
                                            <li><a href="#">Home-2</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">Book<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu">
                                        <span>
                                            <a href="#" class="title">Jackets</a>
                                            <a href="#">Tops & Tees</a>
                                            <a href="#">Polo Short Sleeve</a>
                                            <a href="#">Graphic T-Shirts</a>
                                            <a href="#">Jackets & Coats</a>
                                            <a href="#">Fashion Jackets</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">weaters</a>
                                            <a href="#">Crochet</a>
                                            <a href="#">Sleeveless</a>
                                            <a href="#">Stripes</a>
                                            <a href="#">Sweaters</a>
                                            <a href="#">hoodies</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Bottoms</a>
                                            <a href="#">Heeled sandals</a>
                                            <a href="#">Polo Short Sleeve</a>
                                            <a href="#">Flat sandals</a>
                                            <a href="#">Short Sleeve</a>
                                            <a href="#">Long Sleeve</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Jeans Pants</a>
                                            <a href="#">Polo Short Sleeve</a>
                                            <a href="#">Sleeveless</a>
                                            <a href="#">Graphic T-Shirts</a>
                                            <a href="#">Hoodies</a>
                                            <a href="#">Jackets</a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="#">Audio books<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu">
                                        <span>
                                            <a href="#" class="title">Shirts</a>
                                            <a href="#">Tops & Tees</a>
                                            <a href="#">Sweaters </a>
                                            <a href="#">Hoodies</a>
                                            <a href="#">Jackets & Coats</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Tops & Tees</a>
                                            <a href="#">Long Sleeve </a>
                                            <a href="#">Short Sleeve</a>
                                            <a href="#">Polo Short Sleeve</a>
                                            <a href="#">Sleeveless</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Jackets</a>
                                            <a href="#">Sweaters</a>
                                            <a href="#">Hoodies</a>
                                            <a href="#">Wedges</a>
                                            <a href="#">Vests</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Jeans Pants</a>
                                            <a href="#">Polo Short Sleeve</a>
                                            <a href="#">Sleeveless</a>
                                            <a href="#">Graphic T-Shirts</a>
                                            <a href="#">Hoodies</a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="#">children’s books<i class="fa fa-angle-down"></i></a>
                                    <div class="mega-menu mega-menu-2">
                                        <span>
                                            <a href="#" class="title">Tops</a>
                                            <a href="#">Shirts</a>
                                            <a href="#">Florals</a>
                                            <a href="#">Crochet</a>
                                            <a href="#">Stripes</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Bottoms</a>
                                            <a href="#">Shorts</a>
                                            <a href="#">Dresses</a>
                                            <a href="#">Trousers</a>
                                            <a href="#">Jeans</a>
                                        </span>
                                        <span>
                                            <a href="#" class="title">Shoes</a>
                                            <a href="#">Heeled sandals</a>
                                            <a href="#">Flat sandals</a>
                                            <a href="#">Wedges</a>
                                            <a href="#">Ankle boots</a>
                                        </span>
                                    </div>
                                </li>
                                <li><a href="#">blog<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li><a href="#">blog</a></li>
                                            <li><a href="#">blog-details</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li><a href="/">Homecs</a></li>
                                            <li><a href="/books">Books</a></li>
                                            <li><a href="/book-detail">Book Detail</a></li>
                                            <li><a href="/add-a-book">Add your book</a></li>
                                            <li><a href="/review">Review</a></li>
                                            <li><a href="/profile">Profile</a></li>
                                            <li><a href="/notifications">Notifications</a></li>
                                            <li><a href="/my-request">My request</a></li>
                                            <li><a href="/posts">Posts</a></li>
                                            <li><a href="/post-detail">Post detail</a></li>
                                            <li><a href="/error">404 Page</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="safe-area">
                        <a href="#">sales off</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu-area hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li><a href="#">Home</a></li>
                                <li>
                                    <a href="#">Book</a>
                                    <ul>
                                        <li><a href="#">Tops & Tees</a></li>
                                        <li><a href="#">Polo Short Sleeve</a></li>
                                        <li><a href="#">Graphic T-Shirts</a></li>
                                        <li><a href="#">Jackets & Coats</a></li>
                                        <li><a href="#">Fashion Jackets</a></li>
                                        <li><a href="#">Crochet</a></li>
                                        <li><a href="#">Sleeveless</a></li>
                                        <li><a href="#">Stripes</a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">hoodies</a></li>
                                        <li><a href="#">Heeled sandals</a></li>
                                        <li><a href="#">Polo Short Sleeve</a></li>
                                        <li><a href="#">Flat sandals</a></li>
                                        <li><a href="#">Short Sleeve</a></li>
                                        <li><a href="#">Long Sleeve</a></li>
                                        <li><a href="#">Polo Short Sleeve</a></li>
                                        <li><a href="#">Sleeveless</a></li>
                                        <li><a href="#">Graphic T-Shirts</a></li>
                                        <li><a href="#">Hoodies</a></li>
                                        <li><a href="#">Jackets</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Audio books</a>
                                    <ul>
                                        <li><a href="#">Tops & Tees</a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">Hoodies</a></li>
                                        <li><a href="#">Jackets & Coats</a></li>
                                        <li><a href="#">Long Sleeve</a></li>
                                        <li><a href="#">Short Sleeve</a></li>
                                        <li><a href="#">Polo Short Sleeve</a></li>
                                        <li><a href="#">Sleeveless</a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">Hoodies</a></li>
                                        <li><a href="#">Wedges</a></li>
                                        <li><a href="#">Vests</a></li>
                                        <li><a href="#">Polo Short Sleeve</a></li>
                                        <li><a href="#">Sleeveless</a></li>
                                        <li><a href="#">Graphic T-Shirts</a></li>
                                        <li><a href="#">Hoodies</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">children’s books</a>
                                    <ul>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Florals</a></li>
                                        <li><a href="#">Crochet</a></li>
                                        <li><a href="#">Stripes</a></li>
                                        <li><a href="#">Shorts</a></li>
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Trousers</a></li>
                                        <li><a href="#">Jeans</a></li>
                                        <li><a href="#">Heeled sandals</a></li>
                                        <li><a href="#">Flat sandals</a></li>
                                        <li><a href="#">Wedges</a></li>
                                        <li><a href="#">Ankle boots</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">blog</a>
                                    <ul>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">blog-details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Page</a> //demo page, edit later
                                    <ul>
                                        <li><a href="/">Homecs</a></li>
                                        <li><a href="/books">Books</a></li>
                                        <li><a href="/books/sach-hay-1">Book Detail</a></li>
                                        <li><a href="/book/create">Add your book</a></li>
                                        <li><a href="/books/sach-hay-1/review/2">Review</a></li>
                                        <li><a href="/profile">Profile</a></li>
                                        <li><a href="/notifications">Notifications</a></li>
                                        <li><a href="/my-request">My request</a></li>
                                        <li><a href="/posts">Posts</a></li>
                                        <li><a href="/post-detail">Post detail</a></li>
                                        <li><a href="/error">404 Page</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
