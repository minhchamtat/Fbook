<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Book;

interface BookRepository extends AbstractRepository
{
    public function getData($with = [], $data = [], $dataSelect = ['*'], $attribute = ['', 'desc']);

    public function getLatestBook($with = [], $data = [], $dataSelect = ['*']);

    public function getTopReviewBook($with = [], $data = [], $dataSelect = ['*']);

    public function getTopViewedBook($with = [], $data = [], $dataSelect = ['*']);
}
