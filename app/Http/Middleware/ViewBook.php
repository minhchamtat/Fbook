<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class ViewBook
{
    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle($request, Closure $next)
    {
        $book = $this->getViewedBooks();

        if (!is_null($book)) {
            $book = $this->cleanExpiredViews($book);
            $this->storeBooks($book);
        }

        return $next($request);
    }

    private function getViewedBooks()
    {
        return $this->session->get('viewed_book', null);
    }

    private function cleanExpiredViews($book)
    {
        $time = time();
        $throttleTime = config('view.time');

        return array_filter($book, function ($timestamp) use ($time, $throttleTime) {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeBooks($book)
    {
        $this->session->put('viewed_book', $book);
    }
}
