<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',[0,1]);
            $table->json('title');
            $table->string('slug')->unique();
            $table->string('link')->nullable();
            $table->json('content');
            $table->enum('type',['link','upload']);
            $table->enum('video_group',['video','webinar']);
            $table->enum('url_type',['facebook','iframe']);
            $table->text('name')->nullable();
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
        Schema::dropIfExists('videos');
    }
}
