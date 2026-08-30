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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address');
            $table->string('phone_number')->nullable();
            $table->unsignedInteger('low_price')->default(0); // 予算（下限）
            $table->unsignedInteger('high_price')->default(0); // 予算（上限）
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->unsignedInteger('seating_capacity')->default(0); // 座席数（予約上限に使用）
            $table->timestamps();

            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
