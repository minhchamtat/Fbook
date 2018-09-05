<?php

use Faker\Generator as Faker;
use App\Eloquent\Book;
use App\Eloquent\User;
use App\Eloquent\Category;
use Carbon\Carbon;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'phone' => $faker->unique()->phoneNumber,
        'employee_code' => str_random(6),
        'position' => $faker->word,
        'workspace' => str_random(6),
        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->sentence(12),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'description' => $faker->paragraph(200),
        'author' => $faker->name,
        'publish_date' => $faker->date('Y-m-d'),
        'total_pages' => $faker->numberBetween(50, 100),
        'avg_star' => $faker->numberBetween(0, 5),
        'sku' => str_random(10),
        'count_viewed' => $faker->numberBetween(20, 100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
