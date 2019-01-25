<div class="content">
    <div class="modal fade" id="myModalApps{{ $app->id }}" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.option.editApp') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="contactform">
                        <div class="text-center">
                            {!! Form::open(['method' => 'POST', 'id' => 'addApp' . $app->id, 'files' => true]) !!}
                            <div>
                                {!! Form::hidden('idTextApp', $textApps[$key]->id) !!}
                                {!! Form::hidden('idImgApp', $app->id) !!}
                                {!! Form::file('avatar', ['id' => 'avatar-app', 'required', 'accept' => 'image/png, image/jpeg, image/jpg']) !!}
                            </div>
                            <div id="top-banner">
                                {!! Form::text('name', $textApps[$key]->value, ['class' => 'txt', 'id' => 'message-banner' .$app->id, 'required', 'tabindex' => '1', 'placeholder' => trans('admin.option.appName')]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button value="{{ $app->id }}" type="button" id="text-banner{{ $app->id }}" class="btn btn-info" onclick="editApp(this)">{{ trans('admin.option.edit') }}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.option.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
