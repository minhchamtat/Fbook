@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('settings.admin.layout.add_page', ['name' => 'user']) }}</h3>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-plus m--hide"></i>
                            <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first m--hide">
                                                <span class="m-nav__section-text">Quick Actions</span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">Activity</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">Messages</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">Support</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__separator m-nav__separator--fit">
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                'placeholder' => '',
                                                'class' => 'form-control m-input',
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
                                                'placeholder' => '',
                                                'class' => 'form-control m-input',
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
                                            'img'
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
                                                'class' => 'form-control m-input',
                                            ]
                                        )!!}
                                        {!! $errors->first('password', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        're_password',
                                        trans('settings.admin.user.re_password'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-10">
                                        {!! Form::password(
                                            're_password',
                                            [
                                                'class' => 'form-control m-input',
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
                                                'class' => 'form-control m-input',
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
                                    <div class="col-10">
                                        @if($roles)
                                            @foreach($roles as $role)
                                                <div class="col-4 mb-3">
                                                    <div class="m-checkbox-list">
                                                    {!! Form::checkbox(
                                                        'roles[]',
                                                        $role->id,
                                                        false,
                                                        [
                                                            'class' => 'm-checkbox m-checkbox--bold m-checkbox--state-success',
                                                        ]
                                                    )!!}
                                                    {{ $role->name }}
                                                    </div>
                                                </div>
                                            @endforeach
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
                                                'class' => 'form-control m-input',
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
                                                'class' => 'form-control m-input',
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
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
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
