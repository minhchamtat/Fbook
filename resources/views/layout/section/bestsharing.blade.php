@if ($bestSharing->user)
    <div class="product no-slide image">
        <div class="product-img image">
            <a href="{{ route('user', $bestSharing->user->id) }}" title="{{ $bestSharing->user->name }}">
                <img src="{{ ($bestSharing->user->avatar) ? $bestSharing->user->avatar : asset(config('view.image_paths.user') . '1.png') }}" alt="book" class="primary-image" onerror="this.onerror=null;this.src='http://edev.framgia.vn//assets/user_avatar_default-bc6c6c40940226d6cf0c35571663cd8d231a387d5ab1921239c2bd19653987b2.png';" />

            </a>
        </div>
        <div class="product-details text-center">
            <div class="book-info">
                <h4 class="title-book">
                    <a href="{{ route('user', $bestSharing->user->id) }}" title="{{ $bestSharing->user->name }}">{{ $bestSharing->user->name }}</a>
                </h4>
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>{{ $bestSharing->total }}</span>
                <span>{{ __('settings.home.book') }}</span>
            </div>
        </div>
    </div>
@endif
