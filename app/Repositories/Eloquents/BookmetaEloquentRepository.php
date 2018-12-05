<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Bookmeta;
use App\Repositories\Contracts\BookmetaRepository;
use Illuminate\Support\Facades\Auth;
use App\Eloquent\Book;

class BookmetaEloquentRepository extends AbstractEloquentRepository implements BookmetaRepository
{
    public function model()
    {
        return new Bookmeta;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->where($data)
            ->get();
    }

    public function store($data)
    {
        $office = Auth::user()->office;
        $data['value'] = 1;
        if ($office) {
            $data['key'] = 'in' . '-' . str_slug($office->name);
        } else {
            $data['key'] = 'in' . '-' . str_slug('Ha noi');
        }

        return $this->model()->create($data);
    }

    public function updateCountReview($id)
    {
        $countReview = $this->model()->where('book_id', $id)->where('key', 'count_review')->first();
        $data['key'] = 'count_review';

        if ($countReview) {
            $data['value'] = $countReview->value + 1;

            return $countReview->update($data);
        } else {
            $data['value'] = 1;
            $data['book_id'] = $id;

            return $this->model()->create($data);
        }
    }

    public function destroyCountReview($id)
    {
        try {
            $countReview = $this->model()->where('book_id', $id)->where('key', 'count_review')->first();
            if ($countReview) {
                return $countReview->delete();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
