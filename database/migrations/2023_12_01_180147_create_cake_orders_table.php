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
        Schema::create('cake_orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_id'); //package id
            $table->string('order_id'); //auth user id
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('date');
            $table->string('quantity');
            $table->string('downpayment')->default(0);
            $table->string('image')->nullable(); //proof of payment image
            $table->text('customize')->length(3000);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cake_orders');
    }
};
