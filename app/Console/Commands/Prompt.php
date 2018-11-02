<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Contracts\BookUserRepository;
use App\Repositories\Contracts\NotificationRepository;

class Prompt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prompt:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $bookUser;

    protected $notification;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        BookUserRepository $bookUser,
        NotificationRepository $notification
    ) {
        parent::__construct();
        $this->bookUser = $bookUser;
        $this->notification = $notification;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $list = $this->bookUser->getPromptList();
        $list->each(function ($items, $key) {
            $this->notification->store([
                'send_id' => $key,
                'receive_id' => $key,
                'target_type' => config('model.target_type.user'),
                'target_id' => $key,
                'viewed' => config('model.viewed.false'),
            ]);
            foreach ($items as $item) {
                $this->notification->store([
                    'send_id' => $key,
                    'receive_id' => $item->user_id,
                    'target_type' => config('model.target_type.book_user'),
                    'target_id' => $item->id,
                    'viewed' => config('model.viewed.false'),
                ]);
            }
        });
    }
}
