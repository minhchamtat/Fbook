@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.book.cate') }}</h3>
                </div>
            </div>
        </div>
        <div class="m-content">
            @include('admin.layout.notification')
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ __('admin.cate.listCate') }}
                            </h3>
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
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ route('category.create') }}"
                                   class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <span>{{ __('admin.addNew') }}</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th title="{{ __('admin.cate.index') }}">
                                    {{ __('admin.cate.index') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th title="{{ __('admin.cate.name') }}">
                                    {{ __('admin.cate.name') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th title="{{ __('admin.description') }}">
                                    {{ __('admin.description') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                                <th title="{{ __('admin.action') }}">
                                    {{ __('admin.action') }}
                                    <span class="sort">
                                        <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $s = 1 @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $s++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ url("admin/category/$category->id/edit") }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', 'id' => $category->id], 'id' => "$category->id"]) !!}
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger m-btn m-btn--custom btn-9 btn-sm', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('book.category', $category->slug . '-' . $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{ Html::script('assets/admin/js/datatable.js') }}
{{ Html::script('admin_asset/assets/demo/default/custom/components/base/sweetalert2.js') }}
{{ Html::script('admin_asset/assets/vendors/custom/datatables/datatables.bundle.js') }}

@endsection
