<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Owner;
use App\Eloquent\Bookmeta;
use App\Repositories\Contracts\OwnerRepository;

class OwnerEloquentRepository extends AbstractEloquentRepository implements OwnerRepository
{
    public function model()
    {
        return new Owner;
    }

    public function store($data)
    {
        $record = $this->model()->withTrashed()->where($data)->first();
        if (empty($record)) {
            return $this->model()->create($data);
        } else {
            return $record->restore();
        }
    }
    
    public function destroy($data){
        try {
            $record = $this->model()->where($data);
            
            return $record->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
