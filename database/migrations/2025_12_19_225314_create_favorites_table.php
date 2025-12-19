<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            // User who favorited
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // SubCategory or Product favorited
            $table->foreignId('sub_category_id')
                ->nullable()
                ->constrained('sub_categories')
                ->cascadeOnDelete();

            // If you want products as well, you can add:
            // $table->foreignId('product_id')->nullable()->constrained()->cascadeOnDelete();

            $table->timestamps();

            // Unique constraint to prevent duplicates
            $table->unique(['user_id', 'sub_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
