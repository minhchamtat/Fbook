<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Usermeta;

interface UsermetaRepository extends AbstractRepository
{
    public function getData($data = [], $with = [], $dataSelect = ['*']);
}
