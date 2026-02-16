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
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('author')->nullable();
            $table->string('author_image','500')->nullable();
            $table->string('author_about','1000')->nullable();
            $table->bigInteger('view')->default(0);
            $table->unsignedSmallInteger('reading_time')->default(10)->comment('Minutes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['user_id','author','view','reading_time','author_image','author_about']);
        });
    }
};
