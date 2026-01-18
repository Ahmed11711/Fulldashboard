<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('paymentMethod');
            $table->string('transactionNumber')->nullable();
            $table->string('walletPhone')->nullable();
            $table->string('customerEmail');
            $table->string('customerFirstName');
            $table->string('customerLastName');
            $table->string('customerAddress');
            $table->string('customerCity');
            $table->string('customerState');
            $table->string('customerZip');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('status')->default('Pending');
            $table->string('paymentProof')->nullable(); // path to uploaded image
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
