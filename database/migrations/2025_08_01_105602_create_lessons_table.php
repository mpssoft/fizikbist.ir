<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('video_url')->nullable();
            $table->string('spotplayer_id')->nullable()->default(0);
            $table->string('tags')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_free')->default(true);
            $table->integer('price')->nullable()->default(0);

            $table->enum('status',['published','draft'])->default('published');
            $table->integer('order')->default(0); // lesson order in course
            $table->integer('view')->default(0);
            $table->integer('like')->default(0);
            $table->timestamps();
        });
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->unique(['lesson_id', 'user_id']);
        });

    }

    public function down(): void {
        Schema::dropIfExists('lesson_user');
        Schema::dropIfExists('lessons');
    }
};
