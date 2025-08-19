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
        Schema::table('feedback', function (Blueprint $table) {
            $table->boolean('is_hidden')->default(false)->after('rating');
            $table->boolean('verified_purchase')->default(false)->after('is_hidden');

            // Index truy vấn
            $table->index('products_id', 'feedback_products_id_index');
            $table->index('user_id', 'feedback_user_id_index');
            $table->index(['products_id','rating'], 'feedback_product_rating_index');
            $table->index(['products_id','created_at'], 'feedback_product_created_index');

            // Mỗi user chỉ 1 review cho 1 sản phẩm
            $table->unique(['user_id', 'products_id'], 'feedback_user_product_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropUnique('feedback_user_product_unique');
            $table->dropIndex('feedback_product_rating_index');
            $table->dropIndex('feedback_product_created_index');
            $table->dropIndex('feedback_products_id_index');
            $table->dropIndex('feedback_user_id_index');

            $table->dropColumn(['is_hidden', 'verified_purchase']);
        });
    }
};
