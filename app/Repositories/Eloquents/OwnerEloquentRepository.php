<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Owner;
use App\Repositories\Contracts\OwnerRepository;

class OwnerEloquentRepository extends AbstractEloquentRepository implements OwnerRepository
{
    public function model()
    {
        return new Owner;
    }

    public function store($data)
    {
        return $this->model()->create($data);
    }

    public function destroy($data){
        try {
            $record = $this->model()->where($data)->get();
            
            return $record->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
