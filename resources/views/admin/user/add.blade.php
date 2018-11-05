@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.user.newUser') }}</h3>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--tab">
                        {!! Form::open(
                        [
                            'route' => 'users.store',
                            'class' => 'form-horizontal style-form',
                            'enctype' => 'multipart/form-data',
                            'class' => 'm-form m-form--fit m-form--label-align-right',
                            'name' => 'form_add',
                        ]
                        ) !!}
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'name',
                                        trans('settings.admin.default.name'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'name',
                                            null,
                                            [
                                                'placeholder' => trans('settings.admin.default.name'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                    {!! $errors->first('name', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'email',
                                        trans('settings.admin.user.email'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::email(
                                            'email',
                                            null,
                                            [
                                                'placeholder' => trans('settings.admin.user.email'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('email', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'phone',
                                        trans('settings.admin.user.phone'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'phone',
                                            null,
                                            [
                                                'placeholder' => trans('settings.admin.user.phone'),
                                                'class' => 'form-control m-input',
                                            ]
                                        )!!}
                                        {!! $errors->first('phone', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'img',
                                        trans('settings.admin.user.avatar'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::file(
                                            'img',
                                            [
                                                'required' => 'required'
                                            ]
                                        )!!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'password',
                                        trans('settings.admin.user.password'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::password(
                                            'password',
                                            [
                                                'placeholder' => trans('settings.admin.user.password'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('password', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'password_confirmation',
                                        trans('settings.admin.user.re_password'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                            'id' => 'password-confirm',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::password(
                                            're_password',
                                            [
                                                'placeHolder' => trans('settings.admin.user.re_password'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('re_password', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'position',
                                        trans('settings.admin.user.position'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'position',
                                            null,
                                            [
                                                'placeHolder' => trans('settings.admin.user.position'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('position', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'roles',
                                        trans('settings.admin.user.roles'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-8 role-box">
                                        @if ($roles)
                                            <div class="row">
                                                @foreach ($roles as $role)
                                                    <div class="col-md-4 mb-10">
                                                        <label>
                                                            {!! Form::checkbox(
                                                                'role[]',
                                                                $role->id
                                                            ) !!}
                                                            {{ $role->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        {!! $errors->first('roles', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'employee_code',
                                        trans('settings.admin.user.employee_code'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'employee_code',
                                            null,
                                            [
                                                'placeHolder' => trans('settings.admin.user.employee_code'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('employee_code', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'workspace',
                                        trans('settings.admin.user.workspace'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'workspace',
                                            null,
                                            [
                                                'placeHolder' => trans('settings.admin.user.workspace'),
                                                'class' => 'form-control m-input',
                                                'required' => 'required',
                                            ]
                                        )!!}
                                        {!! $errors->first('workspace', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'office_id',
                                        trans('settings.admin.user.office'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::select(
                                            'office_id',
                                            $offices,
                                            null,
                                            [
                                                'class' => 'form-control m-input',
                                                'required' => 'required'
                                            ]
                                        )!!}
                                        {!! $errors->first('office_id', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'chatwork_id',
                                        trans('settings.admin.user.chatwork_id'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::text(
                                            'chatwork_id',
                                            null,
                                            [
                                                'placeHolder' => trans('settings.admin.user.chatwork_id'),
                                                'class' => 'form-control m-input',
                                            ]
                                        )!!}
                                        {!! $errors->first('chatwork_id', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-12">
                                            {!! Form::submit(
                                                trans('settings.admin.default.submit'),
                                                [
                                                    'class' => 'btn btn-success',
                                                ]
                                            ) !!}
                                            {!! Form::reset(
                                                trans('settings.admin.default.reset'),
                                                [
                                                    'class' => 'btn btn-secondary'
                                                ]
                                            )!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
