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
        Schema::create('pages', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 200);
            $table->string('slug');
            $table->enum('page_type', ['Left', 'Right', 'Faculty', 'None', 'Downloads','Annual Reports','Brochures','Meetings','Orders','Guidelines','Success Story','Documents','Articles','Repository','Dept websites'])->default("None");
            $table->text('page_content')->nullable();
            $table->json('seo')->nullable();
            $table->enum('status', ['Show', 'Hide'])->default("Show");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
