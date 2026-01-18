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
        Schema::create('articles', function (Blueprint $col) {
            $col->id();
            $col->string('title_en');
            $col->string('title_ar');
            $col->text('content_en');
            $col->text('content_ar');
            $col->string('featuredImage')->nullable();
            $col->string('videoUrl')->nullable();
            $col->string('author');
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
