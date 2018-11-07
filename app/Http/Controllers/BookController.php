<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\MediaRepository;
use App\Repositories\Contracts\BookCategoryRepository;
use Yajra\Datatables\DataTables;
use App\Eloquent\Book;
use Symfony\Component\Routing\Annotation\Route;
use Exception;
use Auth;
use App\Repositories\Contracts\OwnerRepository;
use Session;

class BookController extends Controller
{
    protected $book;

    protected $media;

    protected $bookCategory;

    protected $owner;

    public function __construct(
        BookRepository $book,
        MediaRepository $media,
        BookCategoryRepository $bookCategory,
        CategoryRepository $category,
        OwnerRepository $owner
    ) {
        $this->book = $book;
        $this->media = $media;
        $this->bookCategory = $bookCategory;
        $this->category = $category;
        $this->owner = $owner;
    }

    public function index()
    {
        return view('admin.book.list');
    }

    public function ajaxShow()
    {
        try {
            $books = $this->book->getData(
                [],
                [],
                ['id', 'title', 'author', 'publish_date', 'total_pages', 'avg_star', 'count_viewed']
            );
            return Datatables::of($books)
                ->make(true);
        } catch (Exception $e) {
            return view('admin.error.error');
        }
    }

    public function create()
    {
        try {
            $categories = $this->category->getData();

            return view('admin.book.add', compact('categories'));
        } catch (Exception $e) {
            return view('admin.error.error');
        }
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

            return redirect("admin/book/$book->id/edit")->with('success', __('admin.success'));
        } catch (Exception $e) {
            Session::flash('unsuccess', trans('settings.unsuccess.error', ['messages' => $e->getMessage()]));

            return view('admin.error.error');
        }
    }

    public function edit($id)
    {
        try {
            $book = $this->book->find($id);
            $categories = $this->category->getData();

            return view('admin.book.edit', compact('book', 'categories'));
        } catch (Exception $e) {
            return view('admin.error.error');
        }
    }

    public function update(BookRequest $request, $id)
    {
        try {
            //update book
            $book = $this->book->find($id);
            $slug = str_slug($request->title);
            $request->merge(['slug' => $slug]);
            $book->update($request->all());
            $request->merge(['book_id' => $book->id]);
            $data['book_id'] = $book->id;
            //save category
            if ($request->has('category')) {
                $book->categories()->detach();
                $data['category'] = $request->category;
                $this->bookCategory->store($request->all());
            } else {
                $book->categories()->detach();
            }
            //delete image if user upload image
            $this->media->destroy($request->all());
            // create new image
            $this->media->store($request->all());

            return back()->with('success', __('admin.success'));
        } catch (Exception $e) {
            Session::flash('unsuccess', trans('settings.unsuccess.error', ['messages' => $e->getMessage()]));
            
            return view('admin.error.error');
        }
    }

    public function destroy($id)
    {
        try {
            $book = $this->book->find($id);
            //remote category
            $book->categories()->detach();
            //remove image
            if (isset($book->medias[0])) {
                $this->media->destroy($book);
                $this->book->destroy($id);

                return back()->with('success', __('admin.success'));
            } else {
                $book->delete();

                return back()->with('success', __('admin.success'));
            }
        } catch (Exception $e) {
            Session::flash('unsuccess', trans('settings.unsuccess.error', ['messages' => $e->getMessage()]));

            return view('admin.error.error');
        }
    }
}
