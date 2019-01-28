<div class="content">
    <div class="modal fade" id="myModalApp" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.option.addApp') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="contactform">
                        <div>
                            {!! Form::open(['method' => 'POST', 'id' => 'addApp', 'class' => 'text-center', 'files' => true]) !!}
                            <div>
                                {!! Form::file('avatar', ['id' => 'avatar-apps', 'required', 'accept' => 'image/png, image/jpeg, image/jpg']) !!}
                            </div>
                            <div id="top-banner">
                                {!! Form::text('name', null, ['class' => 'txt', 'id' => 'name-app', 'required', 'tabindex' => '1', 'placeholder' => trans('admin.option.appName')]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="text-app" class="btn btn-info">{{ trans('admin.option.add') }}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.option.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
