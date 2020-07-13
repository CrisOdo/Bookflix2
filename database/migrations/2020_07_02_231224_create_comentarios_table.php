<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();            
            $table->string('cuerpo');
            $table->string('spoiler');
            $table->integer('miPosicion')->nullable();
            $table->timestamps();            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');

            $table->index('user_id');
            $table->index('book_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
