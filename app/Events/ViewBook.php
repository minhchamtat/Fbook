<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Eloquent\Book;
use Illuminate\Session\Store;

class ViewBook
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $book;

    protected $session;

    public function __construct(Book $book, Store $session)
    {
        $this->book = $book;
        $this->session = $session;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function handle(Book $book)
    {
        if (!$this->isViewed($book)) {
            $book->increment('count_viewed');
            $this->storeBook($book);
        }
    }

    private function isViewed($book)
    {
        $viewed = $this->session->get('viewed_book', []);

        return array_key_exists($book->id, $viewed);
    }

    private function storeBook($book)
    {
        $key = 'viewed_book' . $book->id;
        $this->session->put($key, time());
    }
}
