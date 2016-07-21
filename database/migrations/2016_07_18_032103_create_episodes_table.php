<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes',function (Blueprint $table){
            $table->increments('id');
            $table->integer('movie_id');
            $table->string('imdb_code');
            $table->string('name');
            $table->string('slug');
            $table->integer('season');
            $table->string('description');
            $table->double('rating');
            $table->string('quality');
            $table->string('released');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
