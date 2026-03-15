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
            $table->boolean('is_deal')->default(false)->after('is_available');
            $table->timestamp('deal_starts_at')->nullable()->after('is_deal');
            $table->timestamp('deal_ends_at')->nullable()->after('deal_starts_at');
        });

        Schema::table('car_parts', function (Blueprint $table) {
            $table->boolean('is_deal')->default(false)->after('is_available');
            $table->timestamp('deal_starts_at')->nullable()->after('is_deal');
            $table->timestamp('deal_ends_at')->nullable()->after('deal_starts_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_deal', 'deal_starts_at', 'deal_ends_at']);
        });

        Schema::table('car_parts', function (Blueprint $table) {
            $table->dropColumn(['is_deal', 'deal_starts_at', 'deal_ends_at']);
        });
    }
};
