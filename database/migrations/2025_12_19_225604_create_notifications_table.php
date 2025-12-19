<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            // المستخدم المستلم للإشعار
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');   // عنوان الإشعار
            $table->text('message');   // نص الإشعار
            $table->string('type')->nullable(); // نوع الإشعار (مثلاً order, favorite, system)
            $table->timestamp('read_at')->nullable(); // لتتبع إذا قُرأ

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
