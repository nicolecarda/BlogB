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
        if (!Schema::hasTable('failed_jobs')) {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->unsignedBigInteger('category_id')->onDelete('cascade');
            $table->unsignedBigInteger('profile_id')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
