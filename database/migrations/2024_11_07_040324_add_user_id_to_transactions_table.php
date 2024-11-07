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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('villa_id');
            $table->unsignedBigInteger('user_id')->nullable(); // Menambahkan kolom user_id
            $table->integer('guests');
            $table->decimal('total_price', 15, 2);
            $table->string('status');
            $table->timestamps();
    
            // Menambahkan foreign key untuk hubungan dengan tabel villas dan users
            $table->foreign('villa_id')->references('id')->on('villas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
