@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Add New Book</h3>
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
                        <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Title</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-search-input" class="col-2 col-form-label">Description</label>
                                    <div class="col-10">
                                        <textarea id="mytextarea" name="mytextarea"></textarea>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="avatar" class="col-2 col-form-label">Avatar book</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="file" id="avatar">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-email-input" class="col-2 col-form-label">Author</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="text" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-datetime-local-input" class="col-2 col-form-label">Publist_date</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="datetime-local" id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-tel-input" class="col-2 col-form-label">Total Page</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="number" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-number-input" class="col-2 col-form-label">Sku</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="text" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-number-input" class="col-2 col-form-label">Count View</label>
                                    <div class="col-10">
                                        <input class="form-control m-input" type="number" id="example-number-input">
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
                                            <button type="reset" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
