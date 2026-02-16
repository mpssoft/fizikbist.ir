<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who requested
            $table->foreignId('grade_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title');
            $table->bigInteger('price')->default(0);
            $table->text('description')->nullable();
            $table->text('admin_description')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'paid', 'in_progress', 'ready'])->default('pending');
            $table->timestamp('delivery_time')->nullable();
            $table->timestamps();
        });

        Schema::create('lesson_plan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_plan_id')->constrained()->onDelete('cascade');

            // Polymorphic fields
            $table->unsignedBigInteger('item_id');
            $table->string('item_type');

            $table->timestamps();
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_plan_items');
        Schema::dropIfExists('lesson_plans');
    }
};
