<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\MediaRepository;
use App\Repositories\Contracts\BookCategoryRepository;

class BookController extends Controller
{
    protected $book;
    protected $media;
    protected $category;

    public function __construct(BookRepository $book, MediaRepository $media, BookCategoryRepository $bCategory)
    {
        $this->book = $book;
        $this->media = $media;
        $this->bCategory = $bCategory;
    }

    public function index()
    {
        $books = $this->book->getData();

        return view('admin.book.list', compact('books'));
    }

    public function create()
    {
        $categories = $this->book->getCategory();

        return view('admin.book.add', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        $slug = str_slug($request->title);
        $request->merge(['slug' => $slug]);
        $book = $this->book->store($request->all());
        //save category
        if ($request->has('category')) {
            foreach ($request->category as $catID) {
                $book->categories()->attach($catID);
            }
        }
        //create image
        if ($request->hasFile('avatar')) {
            $imgBook = $request->file('avatar');
            $filename = str_random(4) . '_' . preg_replace('/\s+/', '', $imgBook->getClientOriginalName());
            $request->merge(['path' => $filename]);
            $imgBook->move('storage/img/book', $filename);
            $request->merge(['target_id' => $book->id]);
            $media = $this->media->store($request->all());
        }

        return redirect('admin/books')->with('success', 'Add Success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $book = $this->book->find($id);
        $path = $book->medias[0]->path;
        $idImg = $book->medias[0]->id;
        $categories = $this->book->getCategory();
        $bookCate = $book->categories()->get();

        return view('admin.book.edit', compact('book', 'path', 'idImg', 'categories', 'bookCate'));
    }

    public function update(BookRequest $request, $id)
    {
        $book = $this->book->find($id);
        $slug = str_slug($request->title);
        $request->merge(['slug' => $slug]);
        $book->update($request->all());
        //save category
        if ($request->has('category')) {
            $book->categories()->detach();
            foreach ($request->category as $catID) {
                $book->categories()->attach($catID);
            }
        } else {
            $book->categories()->detach();
        }
        //delete image if user upload image
        if ($request->hasFile('avatar')) {
            $imgBook = $this->media->find($request->avatar_old);
            if (file_exists('storage/img/book/' . $imgBook->path)) {
                unlink('storage/img/book/' . $imgBook->path);
            }
            $imgBook->delete();
        }

        // create new image
        if ($request->hasFile('avatar')) {
            $imgBook = $request->file('avatar');
            $filename = str_random(4) . '_' . preg_replace('/\s+/', '', $imgBook->getClientOriginalName());
            $request->merge(['path' => $filename]);
            $imgBook->move('storage/img/book', $filename);
            $request->merge(['target_id' => $book->id]);
            $media = $this->media->store($request->all());
        }

        return redirect('admin/books')->with('success', 'Update Success!');
    }

    public function destroy($id)
    {
        $book = $this->book->find($id);

        //remote category
        $book->categories()->detach();

        //remove image
        if ($book->medias[0]) {
            $imgBook = $book->medias[0];
            if ($imgBook->path != null && file_exists('storage/img/theater/' . $imgBook->path)) {
                unlink('storage/img/theater/' . $imgBook->path);
            }
            $imgBook->delete();
            $book->delete();
        }

        return redirect('admin/books')->with('success', 'Success');
    }
}
