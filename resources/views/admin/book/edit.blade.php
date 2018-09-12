@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Edit Book</h3>
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
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <div class="m-portlet m-portlet--tab">
                            {!! Form::open(['method' => 'PUT', 'url' => "admin/books/$book->id", 'files' => 'true', 'class' => 'm-form m-form--fit m-form--label-align-right']) !!}
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('title', 'Title', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('title', $book->title, ['class' => 'form-control m-input', 'placeHolder' => 'Title in here ...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('description', 'Description', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::textarea('description', $book->description, ['id' => 'mytextarea']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('avatar', 'Avatar Book', ['class' => 'col-2 mb-0']) !!}
                                        <div class="col-10 custom-file">
                                            {!! Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                            {!! Form::label('customFile', 'Choose file', ['class' => 'custom-file-label col-10 ml-3']) !!}
                                            {!! Form::hidden('avatar_old', $idImg) !!}
                                        </div>
                                        <div class="col-4 offset-3">
                                            <img src="{{ config('view.image_paths.book') . $path }}" alt="" class="imgbook">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('author', 'Author', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('author', $book->author, ['class' => 'form-control m-input', 'placeHolder' => 'Author ...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', 'Publist_date', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::date('publish_date', $book->publish_date, ['class' => 'form-control m-input', 'id' => 'example-datetime-local-input']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', 'Total Pages', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::number('total_pages', $book->total_pages, ['class' => 'form-control m-input', 'placeHolder' => 'Total pages']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('sku', 'Sku', ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('sku', $book->sku, ['class' => 'form-control m-input', 'placeHolder' => 'Sku of book']) !!}
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
                                                                    <input type="checkbox" value="{{ $cat->id }}" name="category[]"
                                                                        @foreach ($bookCate as $bc)
                                                                            @if ($bc->id === $cat->id)
                                                                                {{ 'checked' }}
                                                                            @endif
                                                                        @endforeach
                                                                    >
                                                                    {{ $cat->name }}
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
