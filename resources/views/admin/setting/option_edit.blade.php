<div class="content">
    <div class="modal fade" id="myModalText{{ $textBanner->id }}" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.option.editText') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="contactform">
                        <div class="text-center">
                            {!! Form::textarea('message', $textBanner->value, ['class' => 'txtarea', 'id' => 'message-banner' . $textBanner->id, 'tabindex' => 4, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button value="{{ $textBanner->id }}" type="button" id="text-banner{{ $textBanner->id }}" class="btn btn-info" onclick="editTextBanner(this)">{{ trans('admin.option.edit') }}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.option.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
