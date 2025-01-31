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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Menggunakan user_id sebagai foreign key yang mengarah ke users.id
            $table->unsignedBigInteger('customer_id');  // nama kolom tetap customer_id
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();

            // Menambahkan foreign key constraint yang mengarah ke users.id
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
