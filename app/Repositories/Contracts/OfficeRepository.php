<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Office;

interface OfficeRepository extends AbstractRepository
{
    public function getData($data = [], $with = [], $dataSelect = ['*']);
}
