<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookCategoryRepository;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\MediaRepository;
use App\Repositories\Contracts\CategoryRepository;

class BookController extends Controller
{
    protected $book;

    protected $category;

    protected $bookCategory;

    protected $media;

    protected $with = [
        'medias',
        'categories',
        'owners',
        'reviews',
    ];

    public function __construct(BookRepository $book, CategoryRepository $category, BookCategoryRepository $bookCategory, MediaRepository $media)
    {
        $this->book = $book;
        $this->category = $category;
        $this->bookCategory = $bookCategory;
        $this->media = $media;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

            return back()->with('success', __('page.success'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = last(explode('-', $id));
        $book = $this->book->find($id, $this->with);
        $relatedBookIds = $this->bookCategory->getBooks($book->categories->pluck('id'));
        $relatedBooks = $this->book->getData(['medias'], $relatedBookIds);
        
        return view('book.book_detail', compact('book', 'relatedBooks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
