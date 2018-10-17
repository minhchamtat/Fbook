<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Review;

interface ReviewBookRepository extends AbstractRepository
{
    public function store($data = []);

    public function show($data = []);

    public function find($data);

    public function findOrFail($id);

    public function checkReview($data);

    public function update($id, $data = []);

    public function destroy($id);
}
