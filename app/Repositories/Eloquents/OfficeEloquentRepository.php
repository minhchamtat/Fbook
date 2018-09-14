<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Office;
use App\Repositories\Contracts\OfficeRepository;

class OfficeEloquentRepository extends AbstractEloquentRepository implements OfficeRepository
{
    public function model()
    {
        return new Office;
    }

    public function getData()
    {
        return $this->model()
            ->select()
            ->pluck('name', 'id');
    }
}
