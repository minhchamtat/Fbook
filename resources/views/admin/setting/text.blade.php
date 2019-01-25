<div id="hover-app" class="m-widget4__item">
    <div class="m-widget4__info" data-toggle="modal" data-target="#myModalText{{ $textBanner->id }}">
        <span class="m-widget4__title">
            <div id="text-banner{{ $textBanner->id }}">
                <p>{{ $textBanner->value }}</p>
            </div>
        </span>
    </div>
    <span class="m-widget4__ext">
        <span data-toggle="modal" data-target="#myModalText{{ $textBanner->id }}" class="btn btn-info m-btn m-btn--custom btn-sm" title={{ trans('admin.option.editText') }}>
            <i class="fa fa-edit"></i>
        </span>
    </span> 
</div>
