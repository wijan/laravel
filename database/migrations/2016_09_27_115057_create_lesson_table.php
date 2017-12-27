<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title'); //Título de la Lección
            $table->string('content'); //Contenido de la Lección
            $table->tinyInteger('evaluation'); //Evaluación de la Lección (cuan importante/postiva ha sido o es la Lección)
            $table->integer('votes'); // Votos a favor de la Lección
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson');
    }
}
