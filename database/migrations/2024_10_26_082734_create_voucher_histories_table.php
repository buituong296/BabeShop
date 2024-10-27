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
        Schema::create('voucher_histories', function (Blueprint $table) {
            $table->id();

            // Khóa ngoại tới bảng vouchers
            $table->foreignId('voucher_id')->constrained('vouchers')->onDelete('cascade');

            // Khóa ngoại tới bảng users (giả định bảng users tồn tại)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Khóa ngoại tới bảng bills
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');

            $table->datetime('at_datetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_histories');
    }
};
