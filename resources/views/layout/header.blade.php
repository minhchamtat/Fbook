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
                                                <img src="{{ asset(Auth::user()->avatar) }}" alt="avatar" class="avatar">
                                            @else
                                                <img src="{{ asset(config('view.image_paths.user') . '1.png') }}" alt="avatar" class="avatar">
                                            @endif
                                        </span>
                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><b>{{ Auth::user()->name }}</b></a>
                                            @if (session()->get('admin'))
                                                <a class="dropdown-item" href="{{ url('admin') }}">Dasboard</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('my-profile') }}">Profile</a>
                                            <a class="dropdown-item" href="#">My book</a>
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
                                <li><a href="{{ route('framgia.login') }}" class="login_wsm">WSM Login</a></li>
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
                        {!! Form::open([
                            'method' => 'POST',
                            'id' => 'header-search',
                            'class' => 'form-groupt',
                        ]) !!}
                        {!! Form::text(
                            'req',
                            null,
                            [
                                'placeHolder' => 'Search entire store here...',
                                'required' => 'required',
                                'class' => 'form-control m-input'
                            ]
                        ) !!}
                        <a href="#"><i class="fa fa-search"></i></a>
                        {!! Form::close() !!}
                    </div>
                    <div id="search-suggest" class="s-suggest"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="#"><img src="{{ asset(config('view.image_paths.logo') . 'logo.png') }}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="my-cart">
                        <ul>
                            <li>
                                <a href="{{ route('my-request.index') }}" class="{{ Auth::check() ? '' : 'login' }}"><i class="fa fa-bell-o" aria-hidden="true"></i>My Request</a>
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
                                <li class="active"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('books.index') }}">Book</a>
                                </li>
                                <li>
                                    <a href="{{ route('books.create') }}">Add book</a>
                                </li>
                            </ul>
                        </nav>
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
