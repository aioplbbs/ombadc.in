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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')
                  ->constrained('pages')
                  ->onDelete('no action')
                  ->onUpdate('no action');
            $table->string('name');
            $table->string("short_name", 20);
            $table->float('sanctioned', 10, 2);
            $table->float('released', 10, 2);
            $table->float('utilized', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
