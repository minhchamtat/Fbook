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
                        {!! Form::open(['url' => 'admin/books', 'file' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'm-form m-form--fit m-form--label-align-right']) !!}
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    {!! Form::label('title', 'Title', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('title', null, ['class' => 'form-control m-input', 'placeHolder' => 'Title in here ...', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('description', 'Description', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::textarea('description', null, ['id' => 'mytextarea']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('avatar', 'Avatar Book', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::file('avatar', ['required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('author', 'Author', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('author', null, ['class' => 'form-control m-input', 'placeHolder' => 'Author ...', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('date', 'Publist_date', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::date('publish_date', null, ['class' => 'form-control m-input', 'id' => 'example-datetime-local-input', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('date', 'Total Pages', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::number('total_pages', null, ['class' => 'form-control m-input', 'placeHolder' => 'Total pages', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('sku', 'Sku', ['class' => 'col-2']) !!}
                                    <div class="col-10">
                                        {!! Form::text('sku', null, ['class' => 'form-control m-input', 'placeHolder' => 'Sku of book', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    {!! Form::label('category', 'Category', ['class' => 'col-2']) !!}
                                    <div class="col-9">
                                        <div class="row">
                                            @foreach ($categories as $cat)
                                                <div class="col-4 mb-3">
                                                    <div class="m-checkbox-list">
                                                        <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                            <input type="checkbox" value="{{ $cat->id }}" name="category[]" {{ $loop->first ? 'checked' : '' }}>{{ $cat->name }}
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-10">
                                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                                            {!! Form::reset('Cancel', ['class' => 'btn btn-secondary']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
