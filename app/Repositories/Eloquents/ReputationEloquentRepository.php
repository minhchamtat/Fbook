<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Reputation;
use App\Repositories\Contracts\ReputationRepository;

class ReputationEloquentRepository extends AbstractEloquentRepository implements ReputationRepository
{
    public function model()
    {
        return new Reputation;
    }

    public function store($data = [])
    {
        return $this->model()->create($data);
    }
}
