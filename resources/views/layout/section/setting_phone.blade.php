{{ Html::script('assets/user/js/setting.js') }}
<div id="setting">
    <div class="register">
        <div class="register">
            <fieldset class="row2">
                <legend>{{ trans('page.personalSetting') }}
                </legend>
                <div id="telephone-class">
                    <ul>
                        <li id="telephone" title="Reputations">
                            <i id="telephone-avatar" class="fa fa-mobile" aria-hidden="true"></i>
                            <span id="telephone-text">{{ trans('page.telephone') }}</span>
                        </li>
                    </ul>
                </div>
            </fieldset>
            @if ($displayPhone != null)
            <fieldset class="row3">
                <legend>{{ trans('page.profile') }}
                </legend>
                <div class="infobox"><h4>{{ trans('page.display') }}</h4>
                    <p>{{ trans('page.warning') }}</p>
                </div>
                <div id="phone-add">
                    @if ($phone != null)
                        <p id="phone-hide" class="phone">{{ $phone }}</p>
                    @endif
                    <a id="displays" class="phone-edit">{{ trans('page.editPhone') }}</a>
                    <div id="display-radio"></div>
                    <div id="setting-phone">
                        {!! Form::text('phone', null, ['id' => 'phone_setting', 'required', 'class' => 'form-control setting-phones']) !!}
                    </div>
                    <div class="success-phone"></div>
                </div>
                <p>
                    <div id="display-radio"></div>
                    {!! Form::radio('phone', 1, ($displayPhone->value == 1)?1:0,  ['class' => 'setting-phone']) !!}
                    <label class="gender">{{ trans('page.public') }}</label>
                    {!! Form::radio('phone', 0, ($displayPhone->value == 0)?1:0, ['class' => 'setting-phone']) !!}
                    <label class="gender">{{ trans('page.private') }}</label>
                </p>
                <div>
                </div>
            </fieldset>
            @else
            <fieldset class="row3">
                <legend>{{ trans('page.profile') }}
                </legend>
                <div class="infobox"><h4>{{ trans('page.display') }}</h4>
                    <p>{{ trans('page.warning') }}</p>
                </div>
                <div id="phone-add">
                    <p class="phone-add">{{ trans('page.addNumber') }}</p>
                    <div id="display-radio"></div>
                    <div id="setting-phone">
                        {!! Form::text('phone', null, ['id' => 'phone_values', 'required', 'class' => 'form-control setting-phone']) !!}
                    </div>
                    <div class="error-phone"></div>
                </div>
                <p>
                    <div id="display-radio"></div>
                    {!! Form::radio('phone', 1, true, ['class' => 'setting-phones']) !!}
                    <label class="gender">{{ trans('page.public') }}</label>
                    {!! Form::radio('phone', 0, false, ['class' => 'setting-phones']) !!}
                    <label class="gender">{{ trans('page.private') }}</label>
                </p>
                <div>
                </div>
            </fieldset>
            @endif
        </div>
    </div>
</div>
<div class="modal-footer">
    @if ($displayPhone != null)
    <button id="save-setting" type="button" class="btn btn-info">{{ trans('page.save') }}</button>
    @else
    <button id="add-phones" type="button" class="btn btn-info">{{ trans('page.save') }}</button>
    @endif
    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('page.close') }}</button>
</div>
