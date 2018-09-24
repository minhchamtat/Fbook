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
            ->paginate(config('view.paginate.user'));
    }

    public function find($id, $with = [])
    {
        return $this->model()
            ->with($with)
            ->findOrFail($id);
    }

    public function store($data = [])
    {
        return $this->model()->create($data);
    }

    public function update($id, $data = [])
    {
        $user = $this->model()->findOrFail($id);
        
        return $user->update($data);
    }

    public function destroy($id)
    {
        return $this->model()->findOrFail($id)->delete();
    }
}
