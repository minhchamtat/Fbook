<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReviewBookRepository;
use App\Http\Requests\ReviewRequest;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\VoteRepository;
use App\Eloquent\Vote;
use Auth;
use Exception;

class ReviewBookController extends Controller
{
    protected $review;

    protected $book;

    public function __construct(
        ReviewBookRepository $review,
        BookRepository $book,
        VoteRepository $vote
    ) {
        $this->review = $review;
        $this->book = $book;
        $this->vote = $vote;
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

    public function show($slug, $id)
    {
        $idBook = (int)last(explode('-', $slug));
        $book = $this->book->find($idBook, [], []);
        $review = $this->review->findOrFail($id);
        $voteUp = $review->votes->where('status', '=', '1')->count();
        $voteDown = $review->votes->where('status', '=', '-1')->count();
        $voted = $voteUp - $voteDown;

        $flag = false;
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $vote = Vote::where('review_id', '=', $review->id)
                ->where('user_id', '=', $userId)->first();

            if ($vote != null) {
                if ( $vote->status == '1') {
                    $flag = config('view.vote.up');
                } elseif ($vote->status == '-1') {
                    $flag = config('view.vote.down');
                } else {
                    $flag = config('view.vote.no');
                }
            }
        }

        return view('book.show_review', compact('review', 'book', 'voted', 'flag'));
    }
}
