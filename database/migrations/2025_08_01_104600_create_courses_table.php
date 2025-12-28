<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('price' )->default(0);
            $table->integer('time')->nullable()->default(0);
            $table->string('spotplayer_id')->nullable()->default(0); // e.g., the video ID from SpotPlayer
            $table->unsignedBigInteger('discount_price')->nullable()->default(0);
            $table->timestamp('discount_expires_at')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('status',['active','in_progress','inactive'])->default('active');
            $table->string('slug')->unique();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('enrolled_at')->nullable();

            $table->boolean('completed')->default(false);
            $table->integer('point')->nullable(); // or float if needed
            $table->timestamps();

            $table->unique(['course_id', 'user_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('course_user');
        Schema::dropIfExists('courses');
    }
};
