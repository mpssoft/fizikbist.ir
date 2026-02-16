<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('title');                // File name / title
            $table->string('file_path');            // Path to file storage
            $table->string('file_type')->nullable(); // pdf, word, excel, ...
            $table->enum('access_type', ['free', 'paid'])->default('free');
            $table->integer('price')->default(0)->nullable(); // price if paid
            $table->enum('state', ['active', 'inactive'])->default('active');
            $table->string('category')->nullable();
            $table->string('icon')->default('fa-file-pdf')->nullable();
            $table->text('description')->nullable();// File description

            $table->integer('downloads')->default(0); // Download counter
            $table->timestamps();
        });

        Schema::create('file_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('file_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('file_user');
        Schema::dropIfExists('files');
    }
};
