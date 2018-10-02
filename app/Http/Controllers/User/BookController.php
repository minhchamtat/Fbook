<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookCategoryRepository;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\MediaRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ReviewBookRepository;
use App\Repositories\Contracts\OwnerRepository;
use App\Repositories\Contracts\OfficeRepository;
use Auth;

class BookController extends Controller
{
    protected $book;

    protected $category;

    protected $bookCategory;

    protected $media;

    protected $review;

    protected $owner;

    protected $office;

    protected $with = [
        'medias',
        'categories',
        'owners',
        'reviews',
    ];

    public function __construct(
        BookRepository $book,
        CategoryRepository $category,
        BookCategoryRepository $bookCategory,
        MediaRepository $media,
        OwnerRepository $owner,
        ReviewBookRepository $review,
        OfficeRepository $office
    ) {
        $this->book = $book;
        $this->category = $category;
        $this->bookCategory = $bookCategory;
        $this->media = $media;
        $this->review = $review;
        $this->owner = $owner;
        $this->office = $office;
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $categories = $this->category->getData();

        return view('book.add', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        try {
            //save book
            $slug = str_slug($request->title);
            $request->merge(['slug' => $slug]);
            $book = $this->book->store($request->all());
            $request->merge(['book_id' => $book->id]);
            //save category
            if ($request->has('category')) {
                $this->bookCategory->store($request->all());
            }
            //create image
            $this->media->store($request->all());

            $data = [
                'user_id' => Auth::user()->id,
                'book_id' => $book->id,
            ];
            $this->owner->store($data);

            return redirect()->route('books.show', $book->slug . '-' . $book->id);
        } catch (Exception $e) {
            return view('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $id = last(explode('-', $slug));
        $book = $this->book->find($id, $this->with);
        $slugId = $book->slug . '-' . $book->id;
        if ($slug == $slugId) {
            $relatedBookIds = $this->bookCategory->getBooks($book->categories->pluck('id'));
            $relatedBooks = $this->book->getData(['medias'], $relatedBookIds);
            $data['book_id'] = $book->id;
            $reviews = $this->review->show($data);

            $flag = true;
            if (Auth::check()) {
                $isReview = $this->review->checkReview($data);
                if ($isReview->count() > 0) {
                    $flag = false;
                }
            } else {
                $flag = false;
            }

            return view('book.book_detail', compact('book', 'relatedBooks', 'flag', 'reviews'));
        }

        return view('error');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        try {
            $userId = Auth::user()->id;
            $categories = $this->category->getData();
            $id = last(explode('-', $slug));
            $book = $this->book->find($id, $this->with);
            $checked = $book->categories->pluck('id')->toArray();
            $slugId = $book->slug . '-' . $book->id;
            $owners = $book->owners->pluck('id')->toArray();
            if ($slug == $slugId && in_array($userId, $owners)) {
                return view('book.edit', compact('categories', 'book', 'checked'));
            }

            return view('error');
        } catch (Exception $e) {
            return view('error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $slug)
    {
        try {
            //update book
            $id = last(explode('-', $slug));
            $request->merge(['slug' => str_slug($request->title)]);
            $userId = Auth::user()->id;
            $book = $this->book->update($id, $userId, $request->all());
            $request->merge(['book_id' => $book->id]);
            if ($book->id == $id) {
                $book->categories()->detach();
                $this->media->destroy($request->all());
                $this->media->store($request->all());
            } elseif (!$request->hasFile('avatar')) {
                $media = $this->book->find($id)->medias[0];
                $media->target_id = $book->id;
                $this->media->clone($media->toArray());
            } else {
                $this->media->store($request->all());
            }
            if ($request->has('category')) {
                $this->bookCategory->store($request->all());
            }

            return back();
        } catch (Exception $e) {
            return view('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
