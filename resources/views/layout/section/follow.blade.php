 @if (isset($followings) && count($followings) > 0)
 <div class="book-status followings">
    <div class="row">
        @foreach ($followings as $u)
        <div class="col-sm-6 col-md-4">
            <div class="d-flex exhibition-item user">
                <a href="{{ route('user', $u->id) }}" class="a-follow">
                    <img src="{{ $u->avatar ? $u->avatar : asset(config('view.image_paths.user') . '1.png') }}" class="avatar-icon">
                </a>
                <div class="user-info overflow-hidden">
                    <a href="{{ route('user', $u->id) }}" class="link"><b>{{ $u->name }}</b></a>
                    <div class="subscribe">
                        @if (in_array($u->id, $followingIds))
                        <button data-id="{{ $u->id }}" class="btn btn-follow following btn-md">{{ trans('settings.profile.following') }}</button>
                        @elseif (Auth::id() == $u->id)
                        @else
                        <button data-id="{{ $u->id }}" class="btn btn-follow follow btn-md">{{ trans('settings.profile.follow') }}</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="pagination-area mt-50">
    <div class="text-center">
        <div class="follows">
            {{ $followings->appends(Request::all())->links() }}
        </div>
    </div>
</div>
@endif

@if (isset($followers) && count($followers) > 0)
<div class="book-status follower">
    <div class="row">
        @foreach ($followers as $u)
        <div class="col-sm-6 col-md-4">
            <div class="d-flex exhibition-item user">
                <a href="{{ route('user', $u->id) }}" class="a-follow">
                    <img src="{{ $u->avatar ? $u->avatar : asset(config('view.image_paths.user') . '1.png') }}" class="avatar-icon">
                </a>
                <div class="user-info overflow-hidden">
                    <a href="{{ route('user', $u->id) }}" class="link"><b>{{ $u->name }}</b></a>
                    <div class="subscribe">
                        @if (in_array($u->id, $followingIds))
                        <button data-id="{{ $u->id }}" class="btn btn-follow following btn-md">{{ trans('settings.profile.following') }}</button>
                        @elseif (Auth::id() == $u->id)
                        @else
                        <button data-id="{{ $u->id }}" class="btn btn-follow follow btn-md">{{ trans('settings.profile.follow') }}</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="pagination-area mt-50">
    <div class="text-center">
        <div class="follows">
            {{ $followers->appends(Request::all())->links() }}
        </div>

    </div>
</div>
@endif
