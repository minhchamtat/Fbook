<div class="suggestion">
    <ul class="suggestions-list">
        <h5 class="bg-light">Notifications</h5>
        @if (isset($notifications) && count($notifications) > 0)
            @foreach ($notifications as $item)
                <li class="result-entry {{ $item->viewed == 0 ? 'new' : 'old' }}" data-suggestion="#" data-position="1" data-type="type" data-analytics-type="merchant">
                    <a href="{{ route($item->route, $item->link) }}" class="result-link" title="{{ $item->message }}" data-id={{ $item->id }}>
                        <div class="media single-noti">
                            <div>
                                @if ($item->userSend->avatar)
                                    <img src="{{ $item->userSend->avatar }}" alt="item" class="media-object mg-thumbnail avatar-icon" />
                                @else
                                    <img src="{{ asset(config('view.image_paths.user') . 'default.jpg') }}" alt="woman" class="media-object mg-thumbnail avatar-icon" />
                                @endif
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $item->userSend->name }}</h4>
                                {{ $item->message }}
                            </div>
                        </div>
                    </a>
                </li>
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

