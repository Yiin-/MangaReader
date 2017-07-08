<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->unique();
            $table->text('description')->nullable();

            $table->string('year_of_realease')->nullable();
            $table->string('author')->nullable();
            $table->string('artist')->nullable();
            $table->enum('reading_direction', ['rtl', 'ltr'])->default('rtl');

            $table->timestamps();
        });

        Schema::create('title_names', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')->references('id')->on('titles');

            $table->string('name')->unique();

            $table->timestamps();
        });

        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->timestamps();
        });

        Schema::create('title_genres', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')->references('id')->on('titles');

            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->references('id')->on('genres');
        });

        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('url')->unique();

            $table->timestamps();
        });

        Schema::create('manga', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('title_id')->unsigned();
            $table->foreign('title_id')->references('id')->on('titles');

            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('sources');

            $table->string('cover_url')->unique();
            $table->string('url')->unique();

            $table->timestamps();
        });

        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('manga_id')->unsigned();
            $table->foreign('manga_id')->references('id')->on('manga');

            $table->integer('number')->unsigned();
            $table->string('name')->nullable();
            $table->string('url')->unique();

            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters');

            $table->integer('number')->unsigned();
            $table->string('image_url')->unique();

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
        //
    }
}
