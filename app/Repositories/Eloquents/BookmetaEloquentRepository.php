<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Bookmeta;
use App\Repositories\Contracts\BookmetaRepository;
use Illuminate\Support\Facades\Auth;

class BookmetaEloquentRepository extends AbstractEloquentRepository implements BookmetaRepository
{
    public function model()
    {
        return new Bookmeta;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->where($data)
            ->get();
    }

    public function store($data)
    {
        $office = Auth::user()->office;
        $data['key'] = 'in' . '-' . str_slug($office->name);
        $data['value'] = 1;

        return $this->model()->create($data);
    }
}
