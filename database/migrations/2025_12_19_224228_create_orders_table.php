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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Sub category related to the order
            $table->foreignId('sub_category_id')
                ->constrained('sub_categories')
                ->cascadeOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('price', 10, 2);
            $table->enum('status', [
                'pending',
                'confirmed',
                'processing',
                'completed',
                'cancelled'
            ])->default('pending');

            // Payment
            $table->enum('payment_status', [
                'unpaid',
                'paid',
                'failed',
                'refunded'
            ])->default('unpaid');

            $table->string('payment_method')->nullable();
            $table->text('desc')->nullable();


            $table->index('status');
            $table->index('payment_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
