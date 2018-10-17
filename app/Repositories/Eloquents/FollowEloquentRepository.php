<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\FollowUser;
use App\Eloquent\User;
use App\Repositories\Contracts\FollowRepository;

class FollowEloquentRepository extends AbstractEloquentRepository implements FollowRepository
{
    public function model()
    {
        return new FollowUser;
    }

    public function store($data = [])
    {
        $record = $this->model()->withTrashed()->where($data)->first();
        if (empty($record)) {
            return $this->model()->create($data);
        } else {
            return $record->restore();
        }
    }
    
    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->get();
    }

    public function destroy($data)
    {
        try {
            $record = $this->model()->where($data);
            
            return $record->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
