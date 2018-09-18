@extends('admin.layout.main')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">{{ __('admin.editBook') }}</h3>
                </div>
            </div>
        </div>

        <div class="m-content">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layout.notification')
                        <div class="m-portlet m-portlet--tab">
                            {!! Form::open(['method' => 'PUT', 'route' => ['book.update', $book->id], 'files' => 'true', 'class' => 'm-form m-form--fit m-form--label-align-right']) !!}
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('title', __('admin.titleBook'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('title', $book->title, ['class' => 'form-control m-input', 'placeHolder' => 'Title in here ...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('description', __('admin.description'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::textarea('description', $book->description, ['id' => 'mytextarea']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('avatar', __('admin.avatarBook'), ['class' => 'col-2 mb-0']) !!}
                                        <div class="col-10 custom-file">
                                            {!! Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                                            {!! Form::label('customFile', 'Choose file', ['class' => 'custom-file-label col-10 ml-3']) !!}
                                            @if (isset($book->medias[0]->id))
                                                {!! Form::hidden('avatar_old', $book->medias[0]->id) !!}
                                            @else
                                                {!! Form::hidden('avatar_old') !!}
                                            @endif
                                        </div>
                                        <div class="col-4 offset-3 mt-3">
                                            @if (isset($book->medias[0]->id))
                                                <img src="/{{ config('view.image_paths.book') . $book->medias[0]->path }}" alt="" class="imgbook">
                                            @else
                                                {{ __('admin.noImg') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('author', __('admin.author'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('author', $book->author, ['class' => 'form-control m-input', 'placeHolder' => 'Author ...']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', __('admin.publist'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::date('publish_date', $book->publish_date, ['class' => 'form-control m-input', 'id' => 'example-datetime-local-input']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('date', __('admin.totalPage'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::number('total_pages', $book->total_pages, ['class' => 'form-control m-input', 'placeHolder' => 'Total pages']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('sku', __('admin.sku'), ['class' => 'col-2']) !!}
                                        <div class="col-10">
                                            {!! Form::text('sku', $book->sku, ['class' => 'form-control m-input', 'placeHolder' => 'Sku of book']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        {!! Form::label('category', __('admin.category'), ['class' => 'col-2']) !!}
                                        <div class="col-9">
                                            <div class="row">
                                                @foreach ($categories as $cat)
                                                    <div class="col-4 mb-3">
                                                        <div class="m-checkbox-list">
                                                            <label class="m-checkbox m-checkbox--bold m-checkbox--state-success">
                                                                <input type="checkbox" value="{{ $cat->id }}" name="category[]"
                                                                    @foreach ($book->categories as $bc)
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
                                                {!! Form::submit(__('admin.submit'), ['class' => 'btn btn-success']) !!}
                                                {!! Form::reset(__('admin.cancel'), ['class' => 'btn btn-secondary']) !!}
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
@section('script')
    {{ Html::script('admin_asset/assets/tinymce/js/tinymce/tinymce.min.js') }}
    <script>
        jQuery(document).ready(function() {
            tinymce.init({
                selector: 'textarea#mytextarea'
            });
        });
    </script>
@endsection
