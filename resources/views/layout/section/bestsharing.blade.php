@if ($bestSharing->user)
    <div class="product no-slide image">
        <div class="product-img image">
            <a href="{{ route('user', $bestSharing->user->id) }}" title="{{ $bestSharing->user->name }}">
                <img src="{{ $bestSharing->user->avatar ? $bestSharing->user->avatar : asset(config('view.image_paths.user') . '1.png') }}" alt="book" class="primary-image" />
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
