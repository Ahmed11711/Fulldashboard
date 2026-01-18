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

        Schema::create('reviews', function (Blueprint $col) {
            $col->id();
            $col->foreignId('productId')->constrained('products')->onDelete('cascade');
            $col->string('customerName');
            $col->string('customerEmail');
            $col->integer('rating');
            $col->text('comment_en');
            $col->text('comment_ar');
            $col->text('reply')->nullable();
            $col->string('status')->default('pending');
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
