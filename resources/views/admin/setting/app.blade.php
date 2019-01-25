<div class="m-widget4 m-widget4--chart-bottom">
    <ul>
        @foreach ($apps as $key => $app)
        @if (isset($textApps[$key]))
        <div id="hover-app" class="m-widget4__item">
            <div class="m-widget4__img m-widget4__img--logo" data-toggle="modal" data-target="#myModalApps{{ $app->id }}">
                <img src="{{ asset(config('view.image_paths.logo') . $app->value) }}" alt="">
            </div>
            <div class="m-widget4__info" data-toggle="modal" data-target="#myModalApps{{ $app->id }}">
                <span class="m-widget4__title">
                    {{ $textApps[$key]->value }}
                </span>
            </div>
            <span class="m-widget4__ext">
                {!! Form::open(['route' => ['deleteApp'], 'method' => 'post', 'id' => 'delete-app']) !!}
                {!! Form::hidden('idApp', $app->id) !!}
                {!! Form::hidden('idText', $textApps[$key]->id) !!}
                <button type="submit" class="btn btn-danger m-btn m-btn--custom btn-9 btn-sm" title={{ trans('admin.delete') }}>
                    <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
            </span>
        </div>
        @endif
        @endforeach
    </ul> 
</div>
