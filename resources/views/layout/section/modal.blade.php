@foreach($books as $book)
    <div class="modal fade" id="productModal{{ $book->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="modal-tab">
                                <div class="product-details-large tab-content">
                                    @if($book->medias->count() > 0)
                                        <div class="tab-pane active" id="image-1">
                                            <img src="{{ asset(config('view.image_paths.book') . $book->medias[0]->path) }}" alt="" />
                                        </div>
                                    @else
                                        <a href="{{ route('books.show', $book->slug . '-' . $book->id) }}">
                                            <img src="{{ asset(config('view.image_paths.book') . 'default.jpg') }}" alt="woman" class="primary" />
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h3>{{ $book->title }}</h3>
                                <p>{!! $book->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
