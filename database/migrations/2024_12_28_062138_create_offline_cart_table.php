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
        Schema::create('offline_cart', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('product_id');
        $table->integer('quantity');
        $table->decimal('total', 10, 2);
        $table->decimal('pay', 10, 2);
        $table->decimal('due', 10, 2)->default(0);
        $table->string('phone');
        $table->timestamps();

        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offline_cart');
    }
};
