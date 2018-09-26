<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Book;

interface BookRepository extends AbstractRepository
{
    public function store($data = []);

    public function find($id);

    public function update($id, $userId, $data = []);

    public function destroy($id);
}
