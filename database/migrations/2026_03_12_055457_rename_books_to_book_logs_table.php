<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::rename('books', 'book_logs');
    }

    public function down()
    {
        Schema::rename('book_logs', 'books');
    }
};