<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\User;
use App\Repositories\Contracts\UserRepository;

class UserEloquentRepository extends AbstractEloquentRepository implements UserRepository
{
    public function model()
    {
        return new User;
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->get();
    }

    public function find($id, $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->findOrFail($id);
    }

    public function store($data = [])
    {
        $data['password'] = bcrypt($data['password']);

        return $this->model()->create($data);
    }

    public function update($id, $data = [])
    {
        $user = $this->model()->findOrFail($id);

        return $user->update($data);
    }

    public function search($attribute, $data, $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->fullTextSearch($attribute, $data);
    }

    public function destroy($id)
    {
        return $this->model()->findOrFail($id)->delete();
    }

    public function countUser()
    {
        return $this->model()->all()->count();
    }

    public function phoneUser($data, $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->where($data)
            ->get();
    }
}
