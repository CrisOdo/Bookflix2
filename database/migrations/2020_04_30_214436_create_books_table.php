<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isbn');
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('archivo')->nullable();
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('editorial_id');
            $table->timestamps();

            $table->index('genre_id');
            $table->index('author_id');
            $table->index('editorial_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
