<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\OfficeRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\BookRepository;
use Auth;

class HomeController extends Controller
{
    protected $book;

    protected $office;

    protected $imageProperties = [
        'path',
        'target_id',
    ];

    public function __construct(BookRepository $book, OfficeRepository $office)
    {
        $this->book = $book;
        $this->office = $office;
    }

    public function index()
    {
        $with = [
            'medias' => function ($q) {
                $q->select($this->imageProperties);
            },
        ];
        $books = $this->book->getData([], [], ['id', 'description']);
        $offices = $this->office->getData()->pluck('name', 'id');
        $topViewed = $this->book->getTopViewedBook($with);
        $topReview = $this->book->getTopReviewBook($with);
        $topInteresting = $this->book->getTopInterestingBook($with);
        $latestBook = $this->book->getLatestBook($with);
        $bestSharing = $this->book->getBestSharing($with);
        $hotUser = $bestSharing['user'];
        $bestSharing = $bestSharing['books'];
        $officeBooks = $this->book->getOfficeBooks($offices, $with);

        $data = compact(
            'topInteresting',
            'topReview',
            'topViewed',
            'latestBook',
            'bestSharing',
            'hotUser',
            'officeBooks',
            'books',
            'flag'
        );

        return view('index', $data);
    }

    public function search(Request $request)
    {
        $result = collect([
            'title' => $this->book->search('title', $request->req),
            'author' => $this->book->search('author', $request->req),
            'description' => $this->book->search('description', $request->req),
        ]);

        return view('layout.section.search', compact('result'));
    }
}
