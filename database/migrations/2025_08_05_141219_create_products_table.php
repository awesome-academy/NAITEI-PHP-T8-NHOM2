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
        Schema::create('products', function (Blueprint $table) {
            $table->id('products_id');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories')->onDelete('cascade');
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->decimal('product_price', 8, 2);
            $table->integer('stock_quantity')->default(0);
            $table->string('image_path')->nullable();
            $table->text('specifications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
