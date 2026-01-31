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
        Schema::create('mis_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained('mis_sectors');
            $table->string('name');
            $table->string('sanctioned');
            $table->string('released');
            $table->string('utilised');
            $table->string('status')->default("1");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mis_departments');
    }
};
