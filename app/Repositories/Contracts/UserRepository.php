<?php

namespace App\Repositories\Contracts;

use App\Eloquent\User;

interface UserRepository extends AbstractRepository
{
    public function getData($with = [], $data = [], $dataSelect = ['*']);
}
