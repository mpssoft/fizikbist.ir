<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->unsignedInteger('clicks')
                ->default(0)
                ->nullable()
                ->after('id'); // adjust position if needed

            $table->string('button_text')
                ->default('اطلاعات بیشتر')
                ->nullable()
                ->after('clicks');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['clicks', 'button_text']);
        });
    }
};
