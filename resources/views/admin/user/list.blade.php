@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.user.user') }}</h3>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('users.create') }}"
                       class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                            <span>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <span>{{ __('admin.addNew') }}</span>
                            </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">{{ __('admin.user.listUser') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th class="width-40-percent text-center" title="{{ trans('settings.admin.default.name') }}" >
                                    {{ trans('settings.admin.default.name') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.user.phone') }}">
                                    {{ trans('settings.admin.user.phone') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-5-percent text-center" title="{{ trans('settings.admin.user.position') }}">
                                    {{ trans('settings.admin.user.position') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-5-percent text-center" title="{{ trans('settings.admin.user.roles') }}" width="120px">
                                    {{ trans('settings.admin.user.roles') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.user.reputation') }}">
                                    {{ trans('settings.admin.user.reputation') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.user.employee_code') }}">
                                    {{ trans('settings.admin.user.employee_code') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.user.office') }}">
                                    {{ trans('settings.admin.user.office') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.user.chatwork_id') }}">
                                    {{ trans('settings.admin.user.chatwork_id') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th class="width-10-percent text-center" title="{{ trans('settings.admin.default.action') }}">
                                    {{ trans('settings.admin.default.action') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
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
                                        <td>{{ $user->office != null ? $user->office->name : null }}</td>
                                        <td class="text-center">{{ $user->chatwork_id }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            {!! Form::open([
                                                'route' => ['users.destroy', $user->id],
                                                'method' => 'DELETE',
                                                'id' => $user->id
                                            ]) !!}
                                            <button class="btn btn-danger btn-9"><i class="fa fa-trash"></i></button>
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
{{ Html::script('assets/admin/js/table.js') }}
{{ Html::script('assets/admin/js/sweetalert2.js') }}
{{ Html::script('admin_asset/assets/vendors/custom/datatables/datatables.bundle.js') }}


@endsection
