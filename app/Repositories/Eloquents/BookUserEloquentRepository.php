<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\BookUser;
use App\Repositories\Contracts\BookUserRepository;

class BookUserEloquentRepository extends AbstractEloquentRepository implements BookUserRepository
{
    public function model()
    {
        return new BookUser;
    }

    public function getData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->where($data)
            ->get();
    }

    public function store($data)
    {
        return $this->model()->create($data);
    }

    public function findWaitingList($id)
    {
        return $this->getData([
            'book_id' => $id,
            'type' => config('model.book_user.type.waiting'),
            'approved' => 0,
        ]);
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

    public function UpdateBookRequest($data)
    {
        $bookRequest = $this->model()->findOrFail($data['id']);

        if (isset($data['approve']) && $data['approve'] == '1') {
            $data['approved'] = config('view.request.approve');
            $data['type'] = config('view.request.reading');

            return $bookRequest->update($data);
        } elseif (isset($data['dismiss']) && $data['dismiss'] == '1') {
            $data['approved'] = config('view.request.dismiss');
            $data['type'] = config('view.request.cancel');

            return $bookRequest->update($data);
        } elseif (isset($data['returned']) && $data['returned'] == '1') {
            $data['approved'] = config('view.request.approve');
            $data['type'] = config('view.request.returned');

            return $bookRequest->update($data);
        }
    }

    public function getDataRequest($data = [], $with = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->where($data)
            ->orderBy($attribute[0], $attribute[1])
            ->paginate(config('view.paginate.book_request'));
    }
}
