<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_author', function (Blueprint $table) {
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')
            //     ->references('id')
            //     ->on('authors')
            //     ->cascade('delete');

            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')
            //     ->references('id')
            //     ->on('posts')
            //     ->cascade('delete');

            $table->foreignIdFor(\App\Models\Author::class,"author_id")->cascade('delete');
            $table->foreignIdFor(\App\Models\Post::class,"post_id")->casdaide('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_author');
    }
};
