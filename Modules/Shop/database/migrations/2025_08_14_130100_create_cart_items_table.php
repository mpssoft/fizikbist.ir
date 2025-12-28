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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('item_type'); // e.g., 'course', 'lesson', 'product'
            $table->unsignedBigInteger('item_id');
            $table->unsignedInteger('qty')->default(1);
            $table->unsignedBigInteger('price')->nullable();
            $table->text('discount')->nullable(); //
            $table->timestamps();

            $table->unique(['user_id', 'item_type', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
