<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\BookUser;
use App\Repositories\Contracts\BookUserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            $record = $this->model()->where($data)->first();
            if ($record) {
                $record->delete();

                return $record->id;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateBookRequest($data)
    {
        try {
            $bookRequest = $this->model()->findOrFail($data['id']);
            if (isset($data['status'])) {
                switch ($data['status']) {
                    case config('view.request.waiting'):
                        $type['type'] = 'reading';
                        break;
                    case config('view.request.reading'):
                        $type['type'] = 'returned';
                        break;
                    case config('view.request.dismiss'):
                        $type['type'] = 'cancel';
                        break;
                    default:
                        # code...
                        break;
                }
                $bookRequest->update($type);

                return $bookRequest;
            }
        } catch (Exception $e) {
            return $e->getMessage();
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

    public function getPromptList()
    {
        $date = date_modify(Carbon::now(), config('view.prompt.time'))->format('Y-m-d H:i:s');
        $result = DB::table('book_user')
            ->select(['*'])
            ->where('type', config('model.book_user.type.reading'))
            ->whereRaw("DATEDIFF('$date', `updated_at`) >= `days_to_read`")
            ->get()
            ->groupBy('owner_id');

        return $result;
    }
}
