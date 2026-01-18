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
        Schema::create('settings', function (Blueprint $col) {
            $col->id();
            $col->string('logo')->nullable();
            $col->string('favicon')->nullable();
            $col->string('businessName');
            $col->string('supportEmail');
            $col->string('paymentPhoneNumber');
            $col->text('address');
            $col->json('socialLinks')->nullable();
            $col->json('theme')->nullable();
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
