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
    protected $onlyAttributes = [
        'id',
        'title',
        'description',
        'avg_star',
        'slug',
        'author',
    ];

    public function model()
    {
        return new Book;
    }

    public function store($data = [])
    {
        $data['sku'] = strtotime(Carbon::now());
        $content = strip_tags($data['description'], config('view.text'));
        $data['description'] = preg_replace('/ style=("|\')(.*?)("|\')/', '', $content);
        $book = $this->model()->create($data);

        $countReview['key'] = 'count_review';
        $countReview['value'] = 0;
        $countReview['book_id'] = $book->id;
        app(Bookmeta::class)->create($countReview);

        return $book;
    }

    public function find($id, $with = ['medias', 'categories'], $dataSelect = ['*'])
    {
        return $this->model()->with($with)->findOrFail($id);
    }

    public function update($id, $userId, $data = [])
    {
        $book = $this->model()->findOrFail($id);
        $firstOwner = $book->owners[0]->id;
        if ($userId == $firstOwner) {
            $book->update($data);
        } else {
            $isClone = app(Bookmeta::class)
                ->where(
                    [
                        'key' => 'clone_book',
                        'value' => $userId,
                    ]
                )->first();
            if ($isClone) {
                $book = $this->model()->findOrFail($isClone->book_id);
                $book->update($data);
            } else {
                $data = array_add($data, 'sku', $book->sku);
                $book = $this->store($data);
                app(Owner::class)->create([
                    'user_id' => $userId,
                    'book_id' => $book->id,
                ]);
                app(Bookmeta::class)->create([
                    'key' => 'clone_book',
                    'value' => $userId,
                    'book_id' => $book->id,
                ]);
            }
        }

        return $book;
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

    public function getRandomBook($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->orderBy($attribute[0], $attribute[1])
            ->paginate(config('view.paginate.book'));
    }

    public function getLatestBook($with = [], $data = [])
    {
        $attribute = [
            'created_at',
            'desc',
        ];
        $books = $this->getData($with, $data, $this->onlyAttributes, $attribute);
        if (count($books) > config('view.taking_numb.latest_book')) {
            $books = $books->take(config('view.taking_numb.latest_book'));
        }

        return $books;
    }

    public function getTopReviewBook($with = [], $data = [])
    {
        $ids = app(Bookmeta::class)->where('key', 'count_review')
            ->orderBy('value', 'desc')
            ->pluck('book_id');
        if (count($ids) > config('view.taking_numb.book_top')) {
            $ids = $ids->take(config('view.taking_numb.book_top'));
        }
        if (!empty($ids)) {
            $books = $this->model()
            ->select($this->onlyAttributes)
            ->with($with)
            ->whereIn('id', $ids)
            ->get();

            return $books;
        }

        return null;
    }

    public function getTopViewedBook($with = [], $data = [])
    {
        $attribute = [
            'count_viewed',
            'desc',
        ];
        $books = $this->getData($with, $data, $this->onlyAttributes, $attribute);
        if (count($books) > config('view.taking_numb.latest_book')) {
            $books = $books->take(config('view.taking_numb.latest_book'));
        }

        return $books;
    }

    public function getTopInterestingBook($with = [], $data = [])
    {
        $attribute = [
            'avg_star',
            'desc',
        ];
        $books = $this->getData($with, $data, $this->onlyAttributes, $attribute);
        if (count($books) > config('view.taking_numb.top_book')) {
            $books = $books->take(config('view.taking_numb.top_book'));
        }

        return $books;
    }

    public function getBestSharing($with = [], $data = [])
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
                    ->select($this->onlyAttributes)
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
                ->where('key', 'in-' . str_slug($value))
                ->where('value', '>', 0)
                ->pluck('book_id');
            if (count($ids) > config('view.random_numb.book')) {
                $ids = $ids->random(config('view.random_numb.book'));
            }
            $data->push(
                [
                    'id' => $key,
                    'office' => $value,
                    'books' => $this->model()
                        ->select($this->onlyAttributes)
                        ->with($with)
                        ->whereIn('id', $ids)
                        ->get(),
                ]
            );
        }

        if (count($data) > config('view.random_numb.office')) {
            $data = $data->random(config('view.random_numb.office'));
        }
        return $data;
    }

    public function getBookCategory($id)
    {
        $books = $this->model()::whereHas('categories', function ($q) use ($id) {
            return $q->where('category_id', $id);
        })->paginate(config('view.paginate.book'));

        return $books;
    }

    public function getBookOffice($data, $with = [])
    {
        $ids = app(Bookmeta::class)
            ->where('key', 'in-' . $data)
            ->where('value', '>', 0)
            ->pluck('book_id');
        $books = $this->model()
            ->select($this->onlyAttributes)
            ->with($with)
            ->whereIn('id', $ids)
            ->paginate(config('view.paginate.book'));

        return $books;
    }

    public function getRelatedBooks($bookIds, $with = [])
    {
        return $this->model()
            ->select($this->onlyAttributes)
            ->with($with)
            ->orderBy('created_at', 'desc')
            ->whereIn('id', $bookIds)
            ->get();
    }

    public function search($attribute, $data, $with = [])
    {
        return $this->model()
            ->select($this->onlyAttributes)
            ->with($with)
            ->fullTextSearch($attribute, $data)
            ->take(config('view.paginate.book_request'))
            ->get();
    }

    public function updateStar($data, $id)
    {
        $book = $this->model()->findOrFail($id);

        $star = 0;
        if (isset($data) && $data != null) {
            foreach ($data as $review) {
                $star += $review->star;
            }

            if ($data->count() > 0) {
                $avgStar['avg_star'] = $star / count($data);
            } else {
                $avgStar['avg_star'] = $star;
            }

            return $book->update($avgStar);
        }
    }

    public function countBook()
    {
        return $this->model()->all()->count();
    }

    public function updateBook($id, $data)
    {
        $book = $this->model()->find($id);
        $description = strip_tags($data['description'], config('view.text'));
        $data['description'] = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description);
        $book->update($data);

        return $book;
    }
}
