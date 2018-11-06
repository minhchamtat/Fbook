@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.user.editUser') }}</h3>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--tab">
                        {!! Form::open(
                        [
                            'route' => ['users.update', $user->id],
                            'method' => 'PATCH',
                            'class' => 'form-horizontal style-form',
                            'enctype' => 'multipart/form-data',
                            'class' => 'm-form m-form--fit m-form--label-align-right',
                            'name' => 'form_edit',
                        ]
                        ) !!}
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <div class="col-0">
                                        <img class="rounded float-right avatar-edit" src="{{ $user->avatar }}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row input-ne">
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
                                            $user->name,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
                                            ]
                                        )!!}
                                        {!! $errors->first('name', '<p style="color:red">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row input-ne">
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
                                            $user->email,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
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
                                            $user->phone,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
                                            ]
                                        )!!}
                                        {!! $errors->first('phone', '<p style="color:red">:message</p>') !!}
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
                                    <div class="col-8">
                                        {!! Form::text(
                                            'position',
                                            $user->position,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
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
                                                        <div class="m-checkbox-list">
                                                            {!! Form::checkbox(
                                                                'role[]',
                                                                $role->id,
                                                                $idRoles != null && in_array($role->id, $idRoles),
                                                                [
                                                                    'class' => 'm-checkbox m-checkbox--bold m-checkbox--state-success role-checkbox',
                                                                ]
                                                            ) !!}
                                                            {{ $role->name }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        {!! $errors->first('roles', '<p style="color:red">:message</p>') !!}
                                    </div>
                                    {!! Form::hidden(
                                        'changed',
                                        false,
                                        [
                                            'id' => 'role-hidden',
                                        ]
                                    ) !!}
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label(
                                        'reputation_point',
                                        trans('settings.admin.user.reputation'),
                                        [
                                            'class' => 'col-2 col-form-label',
                                        ]
                                    ) !!}
                                    <div class="col-8">
                                        {!! Form::number(
                                            'reputation_point',
                                            $user->reputation_point,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
                                            ]
                                        )!!}
                                        {!! $errors->first('reputation_point', '<p style="color:red">:message</p>') !!}
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
                                    <div class="col-8">
                                        {!! Form::text(
                                            'employee_code',
                                            $user->employee_code,
                                            [
                                                'class' => 'form-control m-input',
                                                'disabled' => 'disabled',
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
                                    <div class="col-8">
                                        {!! Form::text(
                                            'workspace',
                                            $user->workspace,
                                            [
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
                                    <div class="col-8">
                                        {!! Form::select(
                                            'office_id',
                                            $offices,
                                            $user->office != null ? $user->office->id : null,
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
                                    <div class="col-8">
                                        {!! Form::text(
                                            'chatwork_id',
                                            $user->chatwork_id,
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


