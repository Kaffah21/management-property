<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('transaction_rumahs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('rumah_id')->constrained()->onDelete('cascade');
        $table->date('check_in');
        $table->date('check_out');
        $table->integer('guests');
        $table->decimal('total_price', 10, 2);  // Adjust precision if necessary
        $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
        $table->timestamps();
    });
}


  
    public function down(): void
    {
        Schema::dropIfExists('transaction_rumah');
    }
};
