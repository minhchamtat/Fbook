<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Usermeta;
use App\Repositories\Contracts\UsermetaRepository;
use Illuminate\Support\Facades\Auth;
use App\Eloquent\User;

class UsermetaEloquentRepository extends AbstractEloquentRepository implements UsermetaRepository
{
    public function model()
    {
        return new Usermeta;
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
        $data['value'] = 1;
        if ($office) {
            $data['key'] = 'in' . '-' . str_slug($office->name);
        } else {
            $data['key'] = 'in' . '-' . str_slug('Ha noi');
        }

        return $this->model()->create($data);
    }

    public function updateDisplayPhone($id, $display)
    {
        $countDisplay = $this->model()->where('user_id', $id)->where('key', 'display_phone')->first();
        $data['key'] = 'display_phone';

        if ($countDisplay) {
            $data['value'] = $display;

            return $countDisplay->update($data);
        } else {
            $data['value'] = $display;
            $data['user_id'] = $id;

            return $this->model()->create($data);
        }
    }
}
