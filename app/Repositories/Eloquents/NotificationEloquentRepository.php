<?php

namespace App\Repositories\Eloquents;

use App\Eloquent\Notification;
use App\Repositories\Contracts\NotificationRepository;

class NotificationEloquentRepository extends AbstractEloquentRepository implements NotificationRepository
{
    public function model()
    {
        return new Notification;
    }

    public function getData($with = [], $data = [], $dataSelect = ['*'])
    {
        return $this->model()
            ->select($dataSelect)
            ->with($with)
            ->where($data)
            ->orderBy('viewed', 'asc');
    }

    public function getNotifications($limit, $with = [], $data = [], $dataSelect = ['*'])
    {
        if ($limit >= 0) {
            $records = $this->getData($with, $data)->get();
            $records = $records->take($limit);
        } else {
            $records = $this->getData($with, $data)->paginate(config('view.paginate.notifications'));
        }
        foreach ($records as $record) {
            switch ($record->target_type) {
                case config('model.target_type.book_user'):
                    $book = $record->target->book;
                    $message = config('view.notifications.' . $record->target->type) . $book->title;
                    $record = array_add($record, 'message', $message);
                    $record = array_add($record, 'route', config('view.notifications.route.book'));
                    $record = array_add($record, 'link', $book->slug . '-' . $book->id);
                    break;
                
                case config('model.target_type.review'):
                    $book = $record->target->book;
                    $record = array_add($record, 'message', config('view.notifications.review') . $book->title);
                    $record = array_add($record, 'route', config('view.notifications.route.review'));
                    $link = [
                        $book->slug . '-' . $book->id,
                        $record->target->id,
                    ];
                    $record = array_add($record, 'link', $link);
                    break;

                case config('model.target_type.user'):
                    $record = array_add($record, 'message', config('view.notifications.follow'));
                    $record = array_add($record, 'route', config('view.notifications.route.user'));
                    $record = array_add($record, 'link', $record->send_id);
                    break;

                case config('model.target_type.vote'):
                    $book = $record->target->review->book;
                    $record = array_add($record, 'message', config('view.notifications.vote') . $book->title);
                    $record = array_add($record, 'route', config('view.notifications.route.review'));
                    $link = [
                        $book->slug . '-' . $book->id,
                        $record->target->id,
                    ];
                    $record = array_add($record, 'link', $link);
                    break;

                default:
                    # code...
                    break;
            }
        }

        return $records;
    }

    public function find($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function update($data = [])
    {
        try {
            $record = $this->model()->findOrFail($data['id']);
        
            return $record->update($data);
        } catch (Exception $e) {
            return null;
        }
    }
}
