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
        Schema::create('villa_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('villa_id')->constrained('villas'); // assuming 'villas' is the table where villa data is stored
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('guests');
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_transactions');
    }
};
