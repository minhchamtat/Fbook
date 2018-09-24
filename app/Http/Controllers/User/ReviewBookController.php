<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReviewBookRepository;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BookRepository;
use Auth;
use Exception;

class ReviewBookController extends Controller
{
    protected $review;

    protected $book;

    public function __construct(ReviewBookRepository $review, BookRepository $book)
    {
        $this->review = $review;
        $this->book = $book;
    }

    public function create($slug)
    {
        try {
            $id = (int)last(explode('-', $slug));
            $book = $this->book->find($id, [], []);
            $data['book_id'] = $book->id;

            $flag = true;
            if (Auth::check()) {
                $isReview = $this->review->checkReview($data);
                if ($isReview->count() > 0) {
                    $flag = false;
                }
            } else {
                $flag = false;
            }

            return view('book.review', compact('book', 'flag'));
        } catch (Exception $e) {
            return view('error');
        }
    }

    public function store(ReviewRequest $request, $slug)
    {
        try {
            $id = (int)last(explode('-', $slug));
            $request->merge(['book_id' => $id]);
            $this->review->store($request->all());

            return redirect()->route('books.show', $slug);
        } catch (Exception $e) {
            return view('error');
        }
    }

    public function edit($slug, $id)
    {
        try {
            $idBook = (int)last(explode('-', $slug));
            $book = $this->book->find($idBook, [], []);
            $review = $this->review->findOrFail($id);

            return view('book.edit_review', compact('book', 'review'));
        } catch (Exception $e) {
            return view('error');
        }
    }

    public function update(ReviewRequest $request, $slug, $id)
    {
        try {
            $review = $this->review->findOrFail($id);
            $request->merge(['id', $id]);
            $review->update($request->all());

            return redirect()->route('books.show', $slug);
        } catch (Exception $e) {
            return view('error');
        }
    }

    public function destroy($slug, $id)
    {
        try {
            $this->review->destroy($id);

            return back();
        } catch (Exception $e) {
            return view('error');
        }
    }
}
