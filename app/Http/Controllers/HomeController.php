<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\OfficeRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\BookRepository;
use Auth;

class HomeController extends Controller
{
    protected $bookRepository;

    protected $officeRepository;

    protected $imageProperties = [
        'path',
        'target_id',
    ];

    public function __construct(BookRepository $bookRepository, OfficeRepository $officeRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->officeRepository = $officeRepository;
    }

    public function index()
    {
        $with = [
            'medias' => function ($q) {
                $q->select($this->imageProperties);
            },
        ];
        $books = $this->bookRepository->getData([], [], ['id', 'description']);
        $offices = $this->officeRepository->getData()->pluck('name', 'id');
        $topViewed = $this->bookRepository->getTopViewedBook($with);
        $topReview = $this->bookRepository->getTopReviewBook($with);
        $topInteresting = $this->bookRepository->getTopInterestingBook($with);
        $latestBook = $this->bookRepository->getLatestBook($with);
        $bestSharing = $this->bookRepository->getBestSharing($with);
        $hotUser = $bestSharing['user'];
        $bestSharing = $bestSharing['books'];
        $officeBooks = $this->bookRepository->getOfficeBooks($offices, $with);

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
}
