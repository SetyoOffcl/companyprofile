<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_blog_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tags_id')->constrained()->on('tb_tags')->onDelete('cascade');
            $table->foreignId('blog_id')->constrained()->on('tb_blog')->onDelete('cascade');
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
        Schema::dropIfExists('tb_blog_tags');
    }
}
