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
        Schema::create('cater_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('quantity')->default(0);
            $table->string('beginning_stock')->default(0);
            $table->string('ending_stock')->default(0);
            $table->string('rental_quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cater_stocks');
    }
};
