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

    public function store($data = [])
    {
        foreach ($data['category'] as $category) {
            $data['category_id'] = $category;
            $this->model()->create($data);
        }
    }
    
    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->get();
    }

    public function getBooks($categoryIds = [])
    {
        $books = collect();
        foreach ($categoryIds as $id) {
            $books = $books->merge($this->model()->orderBy('created_at', 'desc')->where('category_id', $id)->get());
        }

        return $books->pluck('book_id')->unique()->take(config('view.limit.related_book'));
    }
}
