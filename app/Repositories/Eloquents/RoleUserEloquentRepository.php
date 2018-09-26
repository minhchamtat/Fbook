<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\RoleUser;
use App\Repositories\Contracts\RoleUSerRepository;

class RoleUserEloquentRepository extends AbstractEloquentRepository implements RoleUserRepository
{
    public function model()
    {
        return new RoleUSer;
    }

    public function store($roles, $userId)
    {
        if ($roles) {
            foreach ($roles as $role) {
                $this->model()->create([
                    'user_id' => $userId,
                    'role_id' => $role,
                ]);
            }
        }
    }

    public function destroy($userId)
    {
        $roleUsers = $this->model()
            ->where('user_id', $userId)
            ->get();

        if ($roleUsers) {
            foreach ($roleUsers as $roleUser) {
                $roleUser->delete();
            }
        }
    }
}
