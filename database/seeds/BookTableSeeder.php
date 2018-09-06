<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Book;
use App\Eloquent\Category;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class, 26)->create()->each(function ($book) {
            $book->categories()->saveMany(
                Category::all()->random(1)
            );
        });
    }
}
