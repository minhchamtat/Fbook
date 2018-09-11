<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Book;
use App\Repositories\Contracts\BookRepository;
use App\Eloquent\Category;

class BookEloquentRepository extends AbstractEloquentRepository implements BookRepository
{
    public function model()
    {
        return new Book;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'], $attribute = ['', 'desc'])
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
    public function update($id, $data = [])
    {
        $model = $this->model->findOrFail($id);

        return $model->update($data);
    }
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }
    public function getCategory()
    {
        return app(Category::class)->select('*')->get();
    }
}
