<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookUserRepository;
use Auth;

class MyRequestController extends Controller
{
    protected $bookUser;

    public function __construct(BookUserRepository $bookUser)
    {
        $this->bookUser = $bookUser;
    }

    public function index()
    {
        $user = Auth::user();
        $data = [
            'user_id' => Auth::id(),
        ];
        $with = [
            'book',
        ];
        $books = $this->bookUser->getDataRequest($data, $with);

        return view('user.my_request', compact('books'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        $this->bookUser->UpdateBookRequest($request->all());

        return back()->with('success', __('page.success'));
    }

    public function destroy($id)
    {
        //
    }
}
