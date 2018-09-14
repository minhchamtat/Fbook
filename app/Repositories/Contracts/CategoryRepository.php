<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Category;

interface CategoryRepository extends AbstractRepository
{
    public function getData($data = [], $with = [], $dataSelect = ['*']);

    public function store($data = []);

    public function find($id);

    public function update($id, $data = []);

    public function delete($id);
}
