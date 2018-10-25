@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.book.book') }}</h3>
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
                                {{ __('admin.list') }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('book.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>{{ __('admin.book.newBook') }}</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead class="text-center">
                            <tr>
                                <th title="Title">{{ __('admin.book.title') }}</th>
                                <th title="Author">{{ __('admin.book.author') }}</th>
                                <th title="Publist date">{{ __('admin.book.publishDate') }}</th>
                                <th title="Total Page">{{ __('admin.book.totalPage') }}</th>
                                <th title="Avg star">{{ __('admin.book.avgStar') }}</th>
                                <th title="View">{{ __('admin.book.view') }}</th>
                                <th title="Actions">{{ __('admin.action') }}</th>
                            </tr>
                        </thead>
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
