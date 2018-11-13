<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Owner;
use App\Eloquent\Bookmeta;
use App\Repositories\Contracts\OwnerRepository;

class OwnerEloquentRepository extends AbstractEloquentRepository implements OwnerRepository
{
    public function model()
    {
        return new Owner;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->get();
    }

    public function store($data)
    {
        return $this->model()->create($data);
    }

    public function destroy($data)
    {
        try {
            $record = $this->model()->where($data);

            return $record->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
