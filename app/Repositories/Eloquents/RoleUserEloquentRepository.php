<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\RoleUser;
use App\Repositories\Contracts\RoleUSerRepository;

class RoleUSerEloquentRepository extends AbstractEloquentRepository implements RoleUSerRepository
{
    public function model()
    {
        return new RoleUSer;
    }

    public function store($roles, $userId)
    {
        if($roles) {
            foreach ($roles as $role) {
                $this->model()->create([
                    'user_id' => $userId,
                    'role_id' => $role,
                ]);
            }
        }
    }

    public function destroy($userId){
        $role_users = $this->model()
            ->where('user_id', $userId)
            ->get();

        if($role_users) {
            foreach ($role_users as $role_user) {
                $role_user->delete();
            }
        }
    }
}
