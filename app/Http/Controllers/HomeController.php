<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\OfficeRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\ReviewBookRepository;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{
    protected $book;

    protected $office;

    protected $user;

    protected $review;

    public function __construct(
        BookRepository $book,
        OfficeRepository $office,
        UserRepository $user,
        ReviewBookRepository $review
    ) {
        $this->book = $book;
        $this->office = $office;
        $this->user = $user;
        $this->review = $review;
    }

    public function index()
    {
        $with = [
            'medias',
            'owners',
        ];
        $offices = $this->office->getData()->pluck('name', 'id');
        $topViewed = $this->book->getTopViewedBook($with);
        $topReview = $this->book->getTopReviewBook($with);
        $topInteresting = $this->book->getTopInterestingBook($with);
        $latestBook = $this->book->getLatestBook($with);
        $bestSharing = $this->book->getBestSharing($with);
        $hotUser = $bestSharing['user'];
        $bestSharing = $bestSharing['books'];
        $officeBooks = $this->book->getOfficeBooks($offices, $with);
        $totalUser = $this->user->countUser();
        $totalBook = $this->book->countBook();
        $totalReview = $this->review->countReview();

        $data = compact(
            'topInteresting',
            'topReview',
            'topViewed',
            'latestBook',
            'bestSharing',
            'hotUser',
            'officeBooks',
            'flag',
            'totalUser',
            'totalBook',
            'totalReview'
        );

        $phone = Auth::user();
        if ((Auth::check()) && ($phone->phone == null)) {
            session()->flash('status');
        }

        return view('index', $data);
    }

    public function adminIndex()
    {
        return view('admin.layout.index');
    }

    public function changeLanguage(Request $request, $language)
    {
        $request->session()->put('website-language', $language);

        return redirect()->back();
    }

    public function searchAjax(SearchRequest $request)
    {
        if ($request->req != '') {
            $result = collect([
                'titles' => $this->book->search('title', $request->req)->take(config('view.paginate.book_request')),
            ]);
        }

        return view('layout.section.search', compact('result'));
    }

    public function search(SearchRequest $request)
    {
        $with = [
            'owners.office',
        ];
        $data['users'] = $this->user->search('name', $request->req);
        $data['titles'] = $this->book->search('title', $request->req, $with);
        $data['authors'] = $this->book->search('author', $request->req, $with);
        $data['descriptions'] = $this->book->search('description', $request->req, $with);
        $data['key'] = $request->req;

        return view('search', $data);
    }

    public function getPhone($phone)
    {
        $pattern = '/^(\+84|0)\d{9,10}$/';
        if (preg_match($pattern, $phone)) {
            $id = Auth::id();
            $data = [
                'phone' => $phone,
            ];
            $this->user->update($id, $data);

            return response()->json([
                'data' => '1',
            ]);
        } else {
            return response()->json([
                'data' => '0',
            ]);
        }
    }
}
