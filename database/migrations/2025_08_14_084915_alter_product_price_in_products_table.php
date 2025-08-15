<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Đổi từ decimal(8,2) thành decimal(20,2)
            $table->decimal('product_price', 20, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Quay lại decimal(8,2) nếu rollback
            $table->decimal('product_price', 8, 2)->change();
        });
    }
};

