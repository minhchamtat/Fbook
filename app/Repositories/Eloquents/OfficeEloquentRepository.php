<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Office;
use App\Eloquent\User;
use App\Repositories\Contracts\OfficeRepository;

class OfficeEloquentRepository extends AbstractEloquentRepository implements OfficeRepository
{
    public function model()
    {
        return new Office;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->get();
    }

    public function find($slug)
    {
        $offices = Office::all();
        foreach ($offices as $office) {
            if ($slug == str_slug($office->name)) {
                $data = $office->name;
            }
        }

        return $data;
    }

    public function store($data = [])
    {
        $this->model()->create($data);

        return \Cache::put('offices', $this->getData(), 1440);
    }
}
