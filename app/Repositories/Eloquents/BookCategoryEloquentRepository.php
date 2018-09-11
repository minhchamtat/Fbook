<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\BookCategory;
use App\Repositories\Contracts\BookCategoryRepository;

class BookCategoryEloquentRepository extends AbstractEloquentRepository implements BookCategoryRepository
{
    public function model()
    {
        return new BookCategory;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()->all();
    }
    public function store($data = [])
    {
        return $this->model()->create($data);
    }
    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }
}
