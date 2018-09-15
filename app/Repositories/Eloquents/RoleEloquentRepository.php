<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Role;
use App\Repositories\Contracts\RoleRepository;

class RoleEloquentRepository extends AbstractEloquentRepository implements RoleRepository
{
    public function model()
    {
        return new Role;
    }

    public function getData()
    {
        return $this->model()
            ->select()
            ->get();
    }
}
