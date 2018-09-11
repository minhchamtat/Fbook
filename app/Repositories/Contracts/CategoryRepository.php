<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Category;

interface CategoryRepository extends AbstractRepository
{
    public function getData($data = [], $with = [], $dataSelect = ['*']);
}
