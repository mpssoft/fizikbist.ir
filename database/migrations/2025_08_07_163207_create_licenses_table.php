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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained();
            $table->string('spotplayer_id')->nullable(); // SpotPlayer _id
            $table->text('spotplayer_key')->nullable();  // License key
            $table->string('spotplayer_url')->nullable(); // Video URL
            $table->json('course_ids')->nullable();      // Course IDs sent to SpotPlayer
            $table->json('license_data')->nullable();    // Entire SpotPlayer response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
