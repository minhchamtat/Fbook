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

    public function getJson($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        $books = $this->model()
            ->select($dataSelect)
            ->with($with)
            ->orderBy($attribute[0], $attribute[1])
            ->get();

        return $books;
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->whereIn('id', $data)
            ->with($with)
            ->paginate(config('view.paginate.Book'));
    }
}
