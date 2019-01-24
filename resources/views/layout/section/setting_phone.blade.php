{{ Html::script('assets/user/js/setting.js') }}
<div id="main">
    <div class="container">
        <div class="group-tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-stacked col-md-3" role="tablist">
                <li role="presentation" class="active"><a href="#phone" aria-controls="phone" role="tab" data-toggle="tab">{{ __('page.telephone') }}</a></li>
                <li role="presentation"><a href="#language" aria-controls="language" role="tab" data-toggle="tab">
                    {{ __('settings.lang.language') }}
                </a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content col-md-6">
                <div role="tabpanel" class="tab-pane active" id="phone">
                    <div class="infobox"><h4>{{ __('page.display') }}</h4>
                        <p>{{ __('page.warning') }}</p>
                    </div>
                    @if ($displayPhone != null)
                        <div id="phone-add">
                            @if ($phone != null)
                                <p id="phone-hide" class="phone">{{ $phone }}</p>
                            @endif
                            <a id="displays" class="phone-edit">{{ __('page.editPhone') }}</a>
                            <div id="display-radio"></div>
                            <div id="setting-phone">
                                {!! Form::text('phone', $phone, ['id' => 'phone_setting', 'required', 'class' => 'form-control setting-phones']) !!}
                            </div>
                            <div class="success-phone"></div>
                            <div class="error-phone"></div>
                        </div>
                        <p>
                            <div id="display-radio" class="display-radio"></div>
                            {!! Form::radio('phone', 1, ($displayPhone->value == 1)?1:0,  ['class' => 'setting-phone']) !!}
                            <label class="gender">{{ __('page.public') }}</label>
                            {!! Form::radio('phone', 0, ($displayPhone->value == 0)?1:0, ['class' => 'setting-phone']) !!}
                            <label class="gender">{{ __('page.private') }}</label>
                        </p>
                    @else
                        <div id="phone-add">
                            <p class="phone-add">{{ __('page.addNumber') }}</p>
                            <div id="display-radio" class="display-radio"></div>
                            <div id="setting-phone">
                                {!! Form::text('phone', null, ['id' => 'phone_values', 'required', 'class' => 'form-control setting-phone']) !!}
                            </div>
                            <div class="error-phone"></div>
                        </div>
                        <p>
                            <div id="display-radio"></div>
                            {!! Form::radio('phone', 1, true, ['class' => 'setting-phones']) !!}
                            <label class="gender">{{ __('page.public') }}</label>
                            {!! Form::radio('phone', 0, false, ['class' => 'setting-phones']) !!}
                            <label class="gender">{{ __('page.private') }}</label>
                        </p>
                    @endif
                    <div class="footer">
                        @if ($displayPhone != null)
                            <button id="save-setting" type="button" class="btn btn-info">{{ __('page.save') }}</button>
                        @else
                            <button id="add-phones" type="button" class="btn btn-info">{{ __('page.save') }}</button>
                        @endif
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('page.close') }}</button>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="language">
                    {!! Form::radio('language', 'en',
                        $language->value == 'en' ? true : '', ['class' => 'setting-phones']) !!}
                    {!! Form::label('language', __('settings.lang.en'), ['class' => 'language']) !!}
                    {!! Form::radio('language', 'vi',
                        $language->value == 'vi' ? true : '', ['class' => 'setting-phones']) !!}
                    {!! Form::label('language', __('settings.lang.vi'), ['class' => 'language']) !!}
                    <br><br>
                    <input type="button" class="btn btn-info save-language" value="{{ __('page.save') }}" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('page.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
