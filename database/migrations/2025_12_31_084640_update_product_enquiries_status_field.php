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
        Schema::table('product_enquiries', function (Blueprint $table) {
            // Drop the old enum column
            $table->dropColumn('status');
        });

        Schema::table('product_enquiries', function (Blueprint $table) {
            // Add new string column with default 'pending'
            $table->string('status')->default('pending')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('product_enquiries', function (Blueprint $table) {
            $table->enum('status', ['pending', 'viewed', 'replied', 'closed'])->default('pending')->after('message');
        });
    }
};
