<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            DB::statement('ALTER TABLE books ADD FULLTEXT `title` (`title`)');
            DB::statement('ALTER TABLE books ADD FULLTEXT `author` (`author`)');
            DB::statement('ALTER TABLE books ADD FULLTEXT `description` (`description`)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            DB::statement('ALTER TABLE books DROP INDEX title');
            DB::statement('ALTER TABLE books DROP INDEX author');
            DB::statement('ALTER TABLE books DROP INDEX description');
        });
    }
}
