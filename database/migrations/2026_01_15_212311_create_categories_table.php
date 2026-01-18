<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $col) {
            $col->id();
            $col->string('name_en');
            $col->string('name_ar');
            $col->string('image')->nullable();
            $col->timestamps();
        });
    }

    public function down(): void
    {

        Schema::dropIfExists('categories');
    }
};
