<?php

namespace App\Repositories\Contracts;

use App\Eloquent\RoleUser;

interface RoleUserRepository extends AbstractRepository
{
    public function store($roles, $userId);

    public function destroy($userId);
}
