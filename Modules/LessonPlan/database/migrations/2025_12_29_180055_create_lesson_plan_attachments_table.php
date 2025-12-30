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
        Schema::create('lesson_plan_attachments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lesson_plan_id')
                ->constrained()
                ->cascadeOnDelete();

            // who uploaded this file

            $table->unsignedBigInteger('uploaded_by');
            $table->foreign('uploaded_by')->references('id')->on('users');
            // file info
            $table->string('original_name');
            $table->string('path');
            $table->string('mime_type');
            $table->bigInteger('size');

            // who can see it
            $table->enum('visibility', ['user', 'admin', 'both'])->default('both');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_plan_attachments');
    }
};
