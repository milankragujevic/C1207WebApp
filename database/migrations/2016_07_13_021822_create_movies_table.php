<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description');
            $table->text('detail');
            $table->string('runtime');
            $table->string('imdb_code');
            $table->string('imdb_vote');
            $table->string('released');
            $table->string('writer');
            $table->string('country');
            $table->string('language');
            $table->string('rated');
            $table->double('rating');
            $table->string('trailer');
            $table->string('award');
            $table->string('type');
            $table->string('quality');
            $table->integer('total_seasons');
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::drop('movies');
    }
}
