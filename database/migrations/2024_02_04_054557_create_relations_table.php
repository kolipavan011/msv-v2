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
        Schema::create('posts_categories', function (Blueprint $table) {
            $table->bigInteger('post_id');
            $table->bigInteger('category_id');
            $table->unique(['post_id', 'category_id']);
        });

        Schema::create('posts_tags', function (Blueprint $table) {
            $table->bigInteger('post_id');
            $table->bigInteger('tag_id');
            $table->unique(['post_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_categories');
        Schema::dropIfExists('posts_tags');
    }
};
