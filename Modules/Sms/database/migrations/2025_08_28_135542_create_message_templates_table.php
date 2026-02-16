<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message')->nullable();
            $table->unsignedBigInteger('bodyId'); // if you want relation
            $table->timestamps();

            // If bodyId refers to another table (e.g., bodies table):
            // $table->foreign('bodyId')->references('id')->on('bodies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('message_templates');
    }
};
