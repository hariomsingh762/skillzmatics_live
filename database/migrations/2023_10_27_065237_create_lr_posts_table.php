<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lr_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_author');
            $table->string('post_date');
            $table->string('post_date_gmt');
            $table->longText('post_content');
            $table->string('post_title');
            $table->text('post_excerpt')->nullable();
            $table->string('post_status');
            $table->string('comment_status');
            $table->string('ping_status');
            $table->string('post_name');
            $table->string('post_modified');
            $table->string('post_modified_gmt');
            $table->bigInteger('post_parent');
            $table->integer('menu_order');
            $table->string('post_type');
            $table->string('post_mime_type')->nullable();
            $table->integer('comment_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lr_posts');
    }
};