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
        Schema::table('users', function (Blueprint $table) {
            //
            //$table->renameColumn('id', 'user_id');
            $table->string('username')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->string('google_id')->nullable()->after('email');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            //$table->renameColumn('user_id', 'id');
            $table->dropColumn(['username', 'first_name', 'last_name', 'role', 'google_id']);
            //
        });
    }
};
