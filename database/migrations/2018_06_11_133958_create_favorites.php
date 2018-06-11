<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('follow_id')->unsigned()->index();
            

            // Foreign key setting
            $table->foreign('user_id')->references('id')->on('microposts')->onDelete('cascade');
            $table->foreign('follow_id')->references('id')->on('microposts')->onDelete('cascade');

            // Do not allow duplication of combination of user_id and follow_id
            $table->unique(['user_id', 'follow_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
