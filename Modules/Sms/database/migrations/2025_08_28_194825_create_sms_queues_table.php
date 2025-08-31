<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sms_queues', function (Blueprint $table) {
            $table->id();

            // Type: single user, group, or all
            $table->enum('type', ['singleuser', 'group', 'all']);

            // Nullable foreign keys depending on type
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            // Pattern (e.g., template id)
            $table->unsignedBigInteger('message_template_id')->nullable();

            // Message details
            $table->text('message')->nullable();
            $table->string('description')->nullable();

            // State of the job
            $table->enum('state', ['init','pending', 'running','completed', 'stopped', 'cancelled'])->default('init');
            $table->integer('processed_count')->default(0);
            // Scheduled time
            $table->dateTime('scheduled_at')->nullable();

            $table->timestamps();

            // Relations
            $table->foreign('group_id')->references('id')->on('groups')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('message_template_id')->references('id')->on('message_templates')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sms_queues');
    }
};
