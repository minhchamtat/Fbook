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
        if (!\Cache::has('offices')) {
            $offices = $this->model()
                ->select($dataSelect)
                ->with($with)
                ->get();
            \Cache::put('offices', $offices, 1440);
        }

        return \Cache::get('offices');
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
}
