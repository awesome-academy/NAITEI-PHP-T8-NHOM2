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
            $table->unsignedInteger('rating_count')->default(0)->after('status');
            $table->decimal('rating_avg', 3, 2)->default(0)->after('rating_count');
            $table->index('rating_avg', 'products_rating_avg_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_rating_avg_index');
            $table->dropColumn(['rating_count', 'rating_avg']);
        });
    }
};
