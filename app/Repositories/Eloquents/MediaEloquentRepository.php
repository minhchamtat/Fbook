<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Media;
use App\Repositories\Contracts\MediaRepository;

class MediaEloquentRepository extends AbstractEloquentRepository implements MediaRepository
{
    public function model()
    {
        return new Media;
    }

    public function getData($data = [])
    {
        return $this->model()->all();
    }
    public function store($data = [])
    {
        $data['target_type'] = 'App\Eloquent\Book';
        $data['priority'] = 1;
        return $this->model()->create($data);
    }
    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }
}
