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
        Schema::create('mis_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained('pages');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('name');
            $table->date('entry_date');
            $table->string('initial_cost');
            $table->string('unit');
            $table->string('final_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mis_proposals');
    }
};
