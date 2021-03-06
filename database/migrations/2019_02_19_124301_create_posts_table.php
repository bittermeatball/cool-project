<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title')->default('Lorem ipsum')->nullable();
            $table->string('post_description')->default('Lorem ipsum')->nullable();
            $table->string('post_thumbnail')->default('Lorem ipsum')->nullable();
            $table->string('post_content',3000)->default('Lorem ipsum')->nullable();
            $table->string('post_author')->default('Editor');
            $table->string('category_id')->nullable()->default(0);
            $table->string('tag_id')->nullable()->default(0);
            $table->string('status')->default('draft');
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
        Schema::dropIfExists('posts');
    }
}
