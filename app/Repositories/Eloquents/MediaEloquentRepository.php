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

        if (isset($data['avatar'])) {
            $imgBook = $data['avatar'];
            $filename = str_random(4) . '_' . preg_replace('/\s+/', '', $imgBook->getClientOriginalName());
            $imgBook->move(config('view.image_paths.book'), $filename);
            $data['path'] = $filename;
            $data['target_id'] = $data['book_id'];
            $data['target_type'] = 'App\Eloquent\Book';
            $data['priority'] = 1;

            return $this->model()->create($data);
        }
    }

    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function destroy($data)
    {
        if (isset($data['avatar_old']) && isset($data['avatar'])) {
            $imgBook = $this->model()->findOrFail($data['avatar_old']);
            if ($imgBook->path != null && file_exists(config('view.image_paths.book') . $imgBook->path)) {
                unlink(config('view.image_paths.book') . $imgBook->path);
            }

            return $imgBook->delete();
        }
    }
}
