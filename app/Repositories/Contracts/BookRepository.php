<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Book;

interface BookRepository extends AbstractRepository
{
    public function getAll($data = []);

    public function store($data = []);

    public function find($id);

    public function update($id, $data = []);

    public function destroy($id);

    public function getCategory();

    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc']);

    public function getLatestBook($with = [], $data = [], $dataSelect = ['*']);

    public function getTopReviewBook($with = [], $data = [], $dataSelect = ['*']);

    public function getTopViewedBook($with = [], $data = [], $dataSelect = ['*']);
}
