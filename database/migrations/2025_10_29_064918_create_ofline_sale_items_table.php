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
        Schema::create('ofline_sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ofline_sale_id')->constrained('ofline_sales')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->string('imei')->nullable();
            $table->string('serial_no')->nullable();
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->string('warranty')->nullable();
            $table->decimal('total', 10, 2);
            $table->decimal('paid', 10, 2);
            $table->decimal('due', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofline_sale_items');
    }
};
