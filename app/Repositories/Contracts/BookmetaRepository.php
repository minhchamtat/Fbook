<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Bookmeta;

interface BookmetaRepository extends AbstractRepository
{
    public function getData($data = [], $with = [], $dataSelect = ['*']);
}
