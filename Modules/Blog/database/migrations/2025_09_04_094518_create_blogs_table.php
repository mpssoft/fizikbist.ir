<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');                   // عنوان
            $table->string('category');                // دسته‌بندی
            $table->text('description')->nullable();   // توضیح کوتاه
            $table->longText('content')->nullable();   // محتوای اصلی
            $table->string('cover_image')->nullable(); // تصویر کاور
            $table->string('tags')->nullable();        // برچسب‌ها
            $table->enum('status', ['draft', 'published'])->default('draft'); // وضعیت
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
