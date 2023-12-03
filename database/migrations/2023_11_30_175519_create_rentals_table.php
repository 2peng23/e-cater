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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('item_id'); //package id
            $table->string('rental_id'); //auth user id
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('date');
            $table->string('downpayment')->default(0);
            $table->string('image')->nullable(); //proof of payment image
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
