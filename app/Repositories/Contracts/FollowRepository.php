<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Follow;

interface FollowRepository extends AbstractRepository
{
    public function getData();
}
