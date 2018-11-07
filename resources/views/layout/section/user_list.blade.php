@if (isset($data) && count($data))
    @for ($i = 0; $i < count($data); $i++)
        <div class="book-status {{ $type }}" id="{{ $type . $i }}">
            <div class="row">
                @foreach ($data[$i] as $u)
                    <div class="col-sm-6 col-md-4">
                        <div class="d-flex exhibition-item user">
                            <a href="{{ route('user', $u->id) }}" class="a-follow">
                                <img src="{{ $u->avatar }}" class="avatar-icon">
                            </a>
                            <div class="user-info overflow-hidden">
                                <a href="{{ route('user', $u->id) }}" class="link"><b>{{ $u->name }}</b></a>
                                <div class="subscribe">
                                    @if (in_array($u->id, $followingIds))
                                        <button data-id="{{ $u->id }}" class="btn btn-follow following">{{ trans('settings.profile.following') }}</button>
                                    @elseif (Auth::id() == $u->id)
                                    @else
                                        <button data-id="{{ $u->id }}" class="btn btn-follow  follow">{{ trans('settings.profile.follow') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endfor
    <div class="mt-50 shop-left">
        <div class="page-number">
            <ul class="pagination">
                <li class="disabled"><a>«</a></li>
                @for ($i = 0; $i < count($data); $i++)
                    <li class="status-page  {{ $i == 0 ? 'active' : ''}}"><a data-target="{{ $type }}" href="#{{ $type . $i }}">{{ $i + 1 }}</a></li>
                @endfor
                <li class="disabled"><a>»</a></li>
            </ul>
        </div>
    </div>
@else
<div class="alert alert-info">
    {{ trans('settings.book.no_user') }}
</div>
@endif
<div class="pagination-area"></div>
