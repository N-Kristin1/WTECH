<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->enum('payment_method', ['credit_card', 'cash', 'bank_transfer']);
            $table->enum('delivery_method', ['home', 'zbox']);
            $table->decimal('total_price', 8, 2);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamps();
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
