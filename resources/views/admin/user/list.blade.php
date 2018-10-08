@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ trans('settings.admin.layout.list_page', ['name' => 'user']) }}</h3>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ trans('settings.admin.layout.list_page', ['name' => 'user']) }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label>{{ trans('settings.admin.default.status') }}</label>
                                            </div>
                                            <div class="m-form__control">
                                                <select class="form-control m-bootstrap-select" id="m_form_status">
                                                    <option value="">{{ trans('settings.admin.default.all') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label class="m-label m-label--single">{{ trans('settings.admin.default.type') }}</label>
                                            </div>
                                            <div class="m-form__control">
                                                <select class="form-control m-bootstrap-select" id="m_form_type">
                                                    <option value="">{{ trans('settings.admin.default.all') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="{{ trans('settings.admin.default.search') }}" id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span>
                                                    <i class="la la-search"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ route('users.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>{{ trans('settings.admin.default.create') }}</span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <table class="m-datatable" id="html_table">
                        <thead>
                            <tr>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.default.name') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.phone') }}</th>
                                <th class="width-5-percent text-center">{{ trans('settings.admin.user.position') }}</th>
                                <th class="width-5-percent text-center">{{ trans('settings.admin.user.roles') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.reputation') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.employee_code') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.workspace') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.office') }}</th>
                                <th class="width-10-percent text-center">{{ trans('settings.admin.user.chatwork_id') }}</th>
                                <th class="width-30-percent text-center" colspan="2">{{ trans('settings.admin.default.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->position }}</td>
                                        <td>
                                            @if($user->roles)
                                                <select class="form-control m-bootstrap-select" style="opacity: 1;">
                                                    @foreach($user->roles as $role)
                                                        <option value="">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td><span class="text-center">{{ $user->reputation_point }}</span></td>
                                        <td>{{ $user->employee_code }}</td>
                                        <td>{{ $user->workspace }}</td>
                                        <td>{{ $user->office != null ? $user->office->name : null }}</td>
                                        <td class="text-center">{{ $user->chatwork_id }}</td>
                                        <td width="200">
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            {!! Form::open([
                                                'route' => ['users.destroy', $user->id],
                                                'method' => 'DELETE',
                                            ]) !!}
                                            <button class="btn btn-danger" onclick="return confirm('{{ trans('settings.admin.default.are_you_sure')}} ')"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{ Html::script('admin_asset/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js') }}
{{ Html::script('admin_asset/assets/demo/default/custom/components/base/sweetalert2.js') }}
{{ Html::script('admin_asset/assets/vendors/custom/datatables/datatables.bundle.js') }}
{{ Html::script('admin_asset/assets/demo/default/custom/crud/datatables/data-sources/ajax-server-side.js') }}
@endsection
