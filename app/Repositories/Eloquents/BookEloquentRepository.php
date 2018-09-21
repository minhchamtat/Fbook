<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Book;
use App\Repositories\Contracts\BookRepository;
use App\Eloquent\Category;
use App\Eloquent\Media;
use Carbon\Carbon;
use App\Eloquent\Bookmeta;
use App\Eloquent\Owner;
use App\Eloquent\User;
use Illuminate\Support\Facades\DB;

class BookEloquentRepository extends AbstractEloquentRepository implements BookRepository
{
    public function model()
    {
        return new Book;
    }

    public function store($data = [])
    {
        return $this->model()->create($data);
    }

    public function find($id, $with = ['medias','categories'], $dataSelect = ['*'])
    {
        $book = $this->model()->findOrFail($id);

        return $this->model()
        ->with($with)
        ->findOrFail($id);
    }

    public function update($id, $data = [])
    {
        $model = $this->model()->findOrFail($id);

        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->model()->findOrFail($id);

        return $model->delete();
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->orderBy($attribute[0], $attribute[1])
            ->get();
    }

    public function getLatestBook($with = [], $data = [], $dataSelect = ['*'])
    {
        $attribute = [
            'created_at',
            'desc',
        ];
        $books = $this->getData($with, $data, $dataSelect, $attribute);
        if (count($books) > config('view.taking_numb.latest_book')) {
            $books = $books->take(config('view.taking_numb.latest_book'));
        }
        
        return $books;
    }

    public function getTopReviewBook($with = [], $data = [], $dataSelect = ['*'])
    {
        $ids = app(Bookmeta::class)->where('key', 'count_review')
            ->orderBy('value', 'desc')
            ->pluck('book_id');
        if (count($ids) > config('view.taking_numb.book_top')) {
            $ids = $ids->take(config('view.taking_numb.book_top'));
        }
        if (!empty($ids)) {
            $books = $this->model()
            ->select($dataSelect)
            ->with($with)
            ->whereIn('id', $ids)
            ->get();

            return $books;
        }
        
        return null;
    }

    public function getTopViewedBook($with = [], $data = [], $dataSelect = ['*'])
    {
        $attribute = [
            'count_viewed',
            'desc',
        ];
        $books = $this->getData($with, $data, $dataSelect, $attribute);
        if (count($books) > config('view.taking_numb.latest_book')) {
            $books = $books->take(config('view.taking_numb.latest_book'));
        }

        return $books;
    }

    public function getTopInterestingBook($with = [], $data = [], $dataSelect = ['*'])
    {
        $attribute = [
            'avg_star',
            'desc',
        ];
        $books = $this->getData($with, $data, $dataSelect, $attribute);
        if (count($books) > config('view.taking_numb.top_book')) {
            $books = $books->take(config('view.taking_numb.top_book'));
        }

        return $books;
    }

    public function getBestSharing($with = [], $data = [], $dataSelect = ['*'])
    {
        $user = app(Owner::class)->select('user_id', DB::raw('count(book_id) as total'))
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->first();
        if (!empty($user)) {
            $user = app(User::class)->findOrFail($user->user_id);
            $ids = app(Owner::class)
                ->where('user_id', $user->id)
                ->pluck('book_id')
                ->take(config('view.taking_numb.best_sharing_book'));

            if (!empty($ids)) {
                $books = $this->model()
                    ->with($with)
                    ->whereIn('id', $ids)
                    ->get();
                $data = compact('books', 'user');
                
                return $data;
            }
        }
        
        return null;
    }

    public function getOfficeBooks($offices, $with = [])
    {
        $data = collect();
        foreach ($offices as $key => $value) {
            $ids = app(Bookmeta::class)
                ->where(
                    [
                        'key' => 'in-' . str_slug($value),
                        'value' => '1',
                    ]
                )
                ->get();
            if (count($ids) > config('view.random_numb.book')) {
                $ids = $ids->random(config('view.random_numb.book'));
            }
            $data->push(
                [
                    'id' => $key,
                    'office' => $value,
                    'books' => $this->model()
                        ->with($with)
                        ->whereIn('id', $ids)
                        ->get(),
                ]
            );
        }

        if (count($data) > config('view.random_numb.book')) {
            $data = $data->random(config('view.random_numb.book'));
        }

        return $data;
    }
}
