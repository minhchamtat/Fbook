<div id="search">
<div class="cart-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="suggestion">
                <div class="tab-content">
                    @if ($page == trans('page.summary'))
                    <div class="tab-pane active" id="title">
                    @else
                    <div class="tab-pane fade" id="title">
                    @endif
                        <ul class="suggestions-list">
                            @if (count($titles) > 0)
                            @foreach ($titles as $book)
                            <li class="result-entry" data-suggestion="Target 1" data-position="1"data-type="type" data-analytics-type="merchant">
                                <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}" class="result-link">
                                    <div class="media">
                                        <div class="left-media">
                                            @if ($book->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="item" class="search-avatar"/>
                                            @else
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="search-avatar"/>
                                            @endif
                                        </div>
                                        <div class="search-media">
                                            <h4 class="media-heading">{{ $book->title }}</h4>
                                            <p>{{ $book->author }}</p>
                                            <div class="user-item">
                                                @if ($book->owners)
                                                @foreach ($book->owners as $owner)
                                                <div class="reviews-actions" id="{{ 'user-' . $owner->id }}">
                                                    @if (!empty($owner->office->name))
                                                    <a class="search-img" href="{{ route('user', $owner->id) }}"
                                                        title="{{ $owner->name }} ( {{ $owner->office->name }} )">
                                                        @if ($owner->avatar != '')
                                                        <img class="user-search" src="{{ $owner->avatar }}" onerror="this.onerror=null;this.src='http://edev.framgia.vn//assets/user_avatar_default-bc6c6c40940226d6cf0c35571663cd8d231a387d5ab1921239c2bd19653987b2.png';">
                                                        @else
                                                        <img class="user-search" src="{{ asset(config('view.image_paths.user') . '1.png') }}">
                                                        @endif
                                                        @if ($owner->office)
                                                        <span class="address">
                                                            {{ $owner->office->address }}
                                                        </span>
                                                        @endif
                                                    </a>
                                                    @endif
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            @else
                            {{ trans('settings.home.not_found') }}
                            @endif
                        </ul>
                        <div class="search-title">
                            <div class="text-center">
                                {{ $titles->appends(Request::all())->links() }}
                            </div>
                        </div>
                    </div>
                    @if ($page == trans('page.book.author'))
                    <div class="tab-pane active" id="author">
                    @else
                    <div class="tab-pane fade" id="author">
                    @endif
                        <ul class="suggestions-list">
                            @if (count($authors) > 0)
                            @foreach ($authors as $author)
                            <li class="result-entry" data-suggestion="Target 1" data-position="1"data-type="type" data-analytics-type="merchant">
                                <a href="{{ route('books.show', $author->slug . '-' . $author->id) }}" class="result-link">
                                    <div class="media">
                                        <div class="left-media">
                                            @if ($author->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $author->medias[0]->path) }}" alt="item" class="search-avatar"/>
                                            @else
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="search-avatar"/>
                                            @endif
                                        </div>
                                        <div class="search-media">
                                            <h4 class="media-heading">{{ $author->title }}</h4>
                                            <p>{{ $author->author }}</p>
                                            <div class="user-item">
                                                @if ($author->owners)
                                                @foreach ($author->owners as $owner)
                                                <div class="reviews-actions" id="{{ 'user-' . $owner->id }}">
                                                    @if (!empty($owner->office->name))
                                                    <a class="search-img" href="{{ route('user', $owner->id) }}"
                                                        title="{{ $owner->name }} ( {{ $owner->office->name }} )">
                                                        @if ($owner->avatar != '')
                                                        <img class="user-search" src="{{ $owner->avatar }}" onerror="this.onerror=null;this.src='http://edev.framgia.vn//assets/user_avatar_default-bc6c6c40940226d6cf0c35571663cd8d231a387d5ab1921239c2bd19653987b2.png';">
                                                        @else
                                                        <img class="user-search" src="{{ asset(config('view.image_paths.user') . '1.png') }}">
                                                        @endif
                                                        @if ($owner->office)
                                                        <span class="address">
                                                            {{ $owner->office->address }}
                                                        </span>
                                                        @endif
                                                    </a>
                                                    @endif
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            @else
                            {{ trans('settings.home.not_found') }}
                            @endif
                        </ul>
                        <div class="search-title">
                            <div class="text-center">
                                {{ $authors->appends(Request::all())->links() }}
                            </div>
                        </div>
                    </div>
                    @if ($page == trans('page.book.description'))
                    <div class="tab-pane active" id="description">
                    @else
                    <div class="tab-pane fade" id="description">
                    @endif
                        <ul class="suggestions-list">
                            @if (count($descriptions) > 0)
                            @foreach ($descriptions as $description)
                            <li class="result-entry" data-suggestion="Target 1" data-position="1"data-type="type" data-analytics-type="merchant">
                                <a href="{{ route('books.show', $description->slug . '-' . $description->id) }}" class="result-link">
                                    <div class="media">
                                        <div class="left-media">
                                            @if ($description->medias->count() > 0)
                                            <img src="{{ asset(config('view.image_paths.book') . $description->medias[0]->path) }}" alt="item" class="search-avatar"/>
                                            @else
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="search-avatar"/>
                                            @endif
                                        </div>
                                        <div class="search-media">
                                            <h4 class="media-heading">{{ $description->title }}</h4>
                                            <p>{{ $description->author }}</p>
                                            <div class="user-item">
                                                @if ($description->owners)
                                                @foreach ($description->owners as $owner)
                                                <div class="reviews-actions" id="{{ 'user-' . $owner->id }}">
                                                    @if (!empty($owner->office->name))
                                                    <a class="search-img" href="{{ route('user', $owner->id) }}"
                                                        title="{{ $owner->name }} ( {{ $owner->office->name }} )">
                                                        @if ($owner->avatar != '')
                                                        <img class="user-search" src="{{ $owner->avatar }}" onerror="this.onerror=null;this.src='http://edev.framgia.vn//assets/user_avatar_default-bc6c6c40940226d6cf0c35571663cd8d231a387d5ab1921239c2bd19653987b2.png';">
                                                        @else
                                                        <img class="user-search" src="{{ asset(config('view.image_paths.user') . '1.png') }}">
                                                        @endif
                                                        @if ($owner->office)
                                                        <span class="address">
                                                            {{ $owner->office->address }}
                                                        </span>
                                                        @endif
                                                    </a>
                                                    @endif
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                            @else
                            {{ trans('settings.home.not_found') }}
                            @endif
                        </ul>
                        <div class="search-title">
                            <div class="text-center">
                                {{ $descriptions->appends(Request::all())->links() }}
                            </div>
                        </div>
                    </div>
                    @if ($page == trans('settings.admin.layout.users'))
                    <div class="tab-pane active" id="users">
                    @else
                    <div class="tab-pane fade" id="users">
                    @endif
                        <div class="suggestion">
                            <ul class="suggestions-list">
                                @if (count($users) > 0)
                                @foreach ($users as $user)
                                <li class="result-entry" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                                    <a href="{{ route('user', $user->id) }}" class="result-link">
                                        <div class="media">
                                            <div>
                                                @if ($user->avatar)
                                                <img src="{{ $user->avatar }}" alt="item" class="media-oject mg-thumbnail avatar-icon" onerror="this.onerror=null;this.src='http://edev.framgia.vn//assets/user_avatar_default-bc6c6c40940226d6cf0c35571663cd8d231a387d5ab1921239c2bd19653987b2.png';"/>
                                                @else
                                                <img src="{{ asset(config('view.image_paths.user') . 'default.jpg') }}" alt="woman" class="media-oject mg-thumbnail avatar-icon"/>
                                                @endif
                                            </div>
                                            <div class="search-name">
                                                <h4 class="media-heading">{{ $user->name }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                {{ trans('settings.home.not_found') }}
                                @endif
                            </ul>
                            <div class="search-title">
                                <div class="text-center">
                                    {{ $users->appends(Request::all())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
