<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OwnerRepository;
use App\Repositories\Contracts\BookUserRepository;
use App\Repositories\Contracts\ReputationRepository;
use App\Eloquent\Owner;
use App\Eloquent\BookUser;
use Auth;

class UserController extends Controller
{
    protected $owner;

    protected $bookUser;

    protected $reputation;

    public function __construct(
        OwnerRepository $owner,
        BookUserRepository $bookUser,
        ReputationRepository $reputation
    ) {
        $this->middleware('auth');
        $this->owner = $owner;
        $this->bookUser = $bookUser;
        $this->reputation = $reputation;
    }

    public function myProfile()
    {
        $user = Auth::user()
            ->load([
                'office',
                'ownerBooks',
                'followers',
                'followings',
            ]);
        $books = $user->ownerBooks->chunk(config('view.paginate.book_profile'));
        $status = config('view.status.sharing');
        $followingIds = $user->followings->pluck('id')->toArray();
        $followers = $user->followers->chunk(config('view.paginate.follow_user'));
        $followings = $user->followings->chunk(config('view.paginate.follow_user'));

        return view('user.profile', compact('user', 'books', 'status', 'followings', 'followers', 'followingIds'));
    }

    public function getBooks($status)
    {
        $data = [
            'user_id' => Auth::id(),
            'type' => $status,
        ];
        $with = [
            'book',
        ];
        $books = $this->bookUser->getData($data, $with)->pluck('book');
        $books = $books->chunk(config('view.paginate.book_profile'));

        return view('layout.section.profile_books', compact('books', 'status'));
    }

    public function sharingBook($id)
    {
        try {
            $result = $this->owner->store([
                'user_id' => Auth::id(),
                'book_id' => $id,
            ]);
            $data = Auth::user()->only('id', 'name', 'avatar');
            $data['avatar'] = asset(config('view.image_paths.user') . $data['avatar']);
            if ($result !== true) {
                $record = $this->reputation->store([
                    'point' => config('model.reputation.share_book'),
                    'user_id' => $data['id'],
                    'target_type' => config('model.target_type.book'),
                    'target_id' => $id,
                ]);
                $point = Auth::user()->reputation_point + $record->point;
                $this->user->update(
                    Auth::id(),
                    [
                        'reputation_point' => $point,
                    ]
                );
            }

            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function removeOwner($id)
    {
        $this->owner->destroy([
            'user_id' => Auth::id(),
            'book_id' => $id,
        ]);

        return Auth::id();
    }

    public function borrowingBook(Request $request, $id)
    {
        $request->merge([
            'type' => config('model.book_user.type.waiting'),
            'book_id' => $id,
            'user_id' => Auth::id(),
            'approved' => config('model.approved.default'),
        ]);

        return $this->bookUser->store($request->all());
    }

    public function cancelBorrowing($id)
    {
        return $this->bookUser->destroy([
            'book_id' => $id,
            'user_id' => Auth::id(),
        ]);
    }

    public function getProfileData($request)
    {
        if ($request != 'following' && $request != 'followers') {
            return $this->getBooks($request);
        } else {
            return null;
        }
    }
}
