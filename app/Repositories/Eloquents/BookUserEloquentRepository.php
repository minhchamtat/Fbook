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

    public function updateBookRequest($data)
    {
        $bookRequest = $this->model()->findOrFail($data['id']);
        if (isset($data['status']) && $data['status'] == config('view.request.waiting')) {
            $type['type'] = 'reading';
        } elseif (isset($data['status'])
            && $data['status'] == config('view.request.reading')
            || $data['status'] == config('view.request.returning')) {
            $type['type'] = 'returned';
        } elseif (isset($data['status']) && $data['status'] == 'dismiss') {
            $type['type'] = 'cancel';
        }

        return $bookRequest->update($type);
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

    public function getDetailData($request)
    {
        try {
            $with = [
                'user',
            ];

            return $this->getData($request, $with)
                ->pluck('user')
                ->unique()
                ->chunk(config('view.paginate.follow_user'));
        } catch (Exception $e) {
            return null;
        }
    }

    public function getBorrowingData($data = [], $with = [], $dataSelect = ['*'])
    {
        return $this->getData($data)->groupBy('owner_id');
    }
}
