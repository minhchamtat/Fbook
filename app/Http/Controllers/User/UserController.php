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
        $this->owner = $owner;
        $this->bookUser = $bookUser;
        $this->reputation = $reputation;
    }

    public function sharingBook($id)
    {
        try {
            $result = $this->owner->store([
                'user_id' => Auth::user()->id,
                'book_id' => $id,
            ]);
            $data = Auth::user()->only('id', 'name', 'avatar');
            $data['avatar'] = asset(config('view.image_paths.user') . $data['avatar']);
            if ($result !== true) {
                $this->reputation->store([
                    'point' => config('model.reputation.share_book'),
                    'user_id' => $data['id'],
                    'target_type' => config('model.target_type.book'),
                    'target_id' => $id,
                ]);
            }

            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function removeOwner($id)
    {
        $this->owner->destroy([
            'user_id' => Auth::user()->id,
            'book_id' => $id,
        ]);

        return Auth::user()->id;
    }

    public function borrowingBook(Request $request, $id)
    {
        $request->merge([
            'type' => config('model.book_user.type.waiting'),
            'book_id' => $id,
            'user_id' => Auth::user()->id,
            'approved' => config('model.approved.default'),
        ]);

        return $this->bookUser->store($request->all());
    }

    public function cancelBorrowing($id)
    {
        return $this->bookUser->destroy([
            'book_id' => $id,
            'user_id' => Auth::user()->id,
        ]);
    }
}
