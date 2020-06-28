<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subname')->nullable();
            $table->string('alias')->nullable();
            $table->longText('content')->nullable();
            $table->bigInteger('view')->nullable();
            $table->unsignedBigInteger('story_id')->nullable();
            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
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
        Schema::dropIfExists('chapters');
    }
}
