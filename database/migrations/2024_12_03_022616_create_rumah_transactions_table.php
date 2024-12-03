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
        Schema::create('rumah_transactions', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('rumah_id');
        $table->string('user_name');
        $table->string('user_email');
        $table->integer('guests');
        $table->date('check_in');
        $table->date('check_out');
        $table->decimal('total_price', 15, 2);
        $table->string('payment_status')->default('pending');
        $table->timestamps();

        $table->foreign('rumah_id')->references('id')->on('rumahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah_transactions');
    }
};
