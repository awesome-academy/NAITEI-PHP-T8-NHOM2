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
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            
            // Lọc theo category + status (listing user)
            $table->index('categories_id');
            $table->index('status');

            // Tìm theo tên (search LIKE), sort theo giá
            $table->index('product_name');
            $table->index('product_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['categories_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['product_name']);
            $table->dropIndex(['product_price']);

            $table->dropUnique('products_slug_unique');

            $table->dropColumn('slug');
            $table->dropColumn('deleted_at');
            $table->dropColumn('status');
        });
    }
};
