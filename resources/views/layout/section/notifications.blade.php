<div class="suggestion">
    <ul class="suggestions-list noti-list">
        <h5 class="bg-light">{{ __('settings.header.notifications.name') }}</h5>
        <div class="view-all">
            <a href="{{ route('markread') }}">{{ __('settings.header.notifications.viewed') }}</a>
        </div>
        @if (isset($notifications) && count($notifications) > 0)
            @foreach ($notifications as $item)
                @if (!is_null($item->route))
                    <li class="result-entry {{ $item->viewed == 0 ? 'new' : 'old' }}" data-suggestion="#" data-position="1" data-type="type" data-analytics-type="merchant">
                        <a href="{{ route($item->route, $item->link) }}" class="result-link" title="{{ $item->message }}" data-id={{ $item->id }}>
                            <div class="media single-noti">
                                <div>
                                    @if ($item->userSend->avatar)
                                        <img src="{{ $item->userSend->avatar }}" alt="item" class="media-object mg-thumbnail avatar-icon" />
                                    @else
                                        <img src="{{ asset(config('view.image_paths.user') . '1.png') }}" alt="woman" class="media-object mg-thumbnail avatar-icon" />
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ ($item->userSend->id == Auth::id()) ? 'Me' : $item->userSend->name }}</h4>
                                    {{ $item->message }}
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="result-entry text-center" data-suggestion="#" data-position="1" data-type="type" data-analytics-type="merchant">
                <div class="media-body">
                    <a href="{{ route('notifications') }}">
                        {{ trans('settings.header.notifications.show_more') }}
                    </a>
                </div>
            </li>
        @else
            <li class="result-entry text-center" data-suggestion="Target 1" data-position="1" data-type="type" data-analytics-type="merchant">
                <div class="media-body">
                    <a>
                        {{ trans('settings.home.not_found') }}
                    </a>
                </div>
            </li>
        @endif
    </ul>
</div>

