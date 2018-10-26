<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\NotificationRepository;
use Auth;

class NotificationController extends Controller
{
    protected $notification;

    public function __construct(
        NotificationRepository $notification
    ) {
        $this->middleware('auth');
        $this->notification = $notification;
    }

    public function getNotifications($limit = -1)
    {
        $with = [
            'target',
            'userSend',
        ];
        $where = [
            'receive_id' => Auth::id(),
        ];

        return $data = $this->notification->getNotifications($limit, $with, $where);
    }

    public function getAllNotifications()
    {
        $notifications = $this->getNotifications();

        return view('user.notifications', compact('notifications'));
    }

    public function getLimitNotifications($limit = 0)
    {
        if ($limit < config('view.limit.notifications')) {
            $notifications = $this->getNotifications(config('view.limit.notifications'));
        } else {
            $notifications = $this->getNotifications($limit);
        }
        
        return view('layout.section.notifications', compact('notifications'));
    }

    public function updateNotification(Request $request)
    {
        return $this->notification->update($request->all());
    }
}
