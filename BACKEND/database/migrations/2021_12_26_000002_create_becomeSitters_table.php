<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecomeSittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitters', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('lastname',255);
            $table->longText('text');
            $table->string('number',255);
            $table->string('email',255);
            $table->string('socialmedia',255);
            $table->boolean('agreement');

            $table->string('image',255)->nullable();
            $table->timestamps();
        });

        Schema::create('sitter_city_area_handbook', function (Blueprint $table) {
            $table->string('city_area',255);
            $table->primary('city_area');

        });

        Schema::create('sitter_city_areas', function (Blueprint $table) {
            $table->id();
            $table->string('city_area',255);
            $table->foreign('city_area')->references('city_area')->on('sitter_city_area_handbook')->onDelete('cascade');
            $table->unsignedBigInteger('sitter_id');
            $table->foreign('sitter_id')->references('id')->on('sitters')->onDelete('cascade');
        });
        Schema::create('sitter_animal_handbook', function (Blueprint $table) {
            $table->string('animal',100);
            $table->primary('animal');
        });

        Schema::create('sitter_animals', function (Blueprint $table) {
            $table->id();
            $table->string('animal',100);
            $table->foreign('animal')->references('animal')->on('sitter_animal_handbook')->onDelete('cascade');
            $table->unsignedBigInteger('sitter_id');
            $table->foreign('sitter_id')->references('id')->on('sitters')->onDelete('cascade');
        });
        Schema::create('sitter_reviews', function (Blueprint $table) {
            $table->id();

            $table->string('name',255);
            $table->longText('text');
            $table->string('avatar',255)->nullable();
            $table->integer('rating');
            $table->integer('thumbsUp');
            $table->integer('thumbsDown');
            $table->timestamps();

            $table->unsignedBigInteger('sitter_id');
            $table->foreign('sitter_id')->references('id')->on('sitters')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('sitter_reviews', function(Blueprint $table) {
            $table->dropForeign(['sitter_id']);
        });

        Schema::table('sitter_animals', function(Blueprint $table) {
          $table->dropForeign(['animal']);
          $table->dropForeign(['sitter_id']);
        });
        Schema::table('sitter_city_areas', function(Blueprint $table) {
          $table->dropForeign(['city_area']);
          $table->dropForeign(['sitter_id']);
        });

        Schema::dropIfExists('sitter_reviews');
        Schema::dropIfExists('sitter_city_areas');
        Schema::dropIfExists('sitter_city_area_handbook');
        Schema::dropIfExists('sitter_animals');
        Schema::dropIfExists('sitter_animal_handbook');
        Schema::dropIfExists('sitters');
    }
}
