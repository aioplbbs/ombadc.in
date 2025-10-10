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
        Schema::create('notices', function (Blueprint $table) {
            $table->id('id');
            $table->json('notice_category');
            $table->enum('notice_type', ['Upload File', 'Link'])->default('Upload File');
            $table->text('notice_name');
            $table->enum('notice_open_in', ['New', 'Same'])->default('New');
            $table->enum('notice_blink', ['Yes', 'No'])->default('Yes')->comment("New Blink Badge");
            $table->date('notice_publish');
            $table->enum('status', ['Show', 'Hide'])->default('Show');
            $table->json('custom_data')->nullable()->comment("Any Custom Data");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
