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
            $table->string('stock_id')->nullable()->after('id');
            $table->string('chassis_number')->nullable()->after('stock_id');
            $table->string('model_code')->nullable()->after('chassis_number');
            $table->string('year_month')->nullable()->after('model_code'); // Format: 2023/4
            $table->string('grade')->nullable()->after('year_month');
            $table->string('body_style')->nullable()->after('grade');
            $table->integer('mileage')->nullable()->after('body_style');
            $table->string('transmission')->nullable()->after('mileage');
            $table->integer('engine_cc')->nullable()->after('transmission');
            $table->string('fuel_type')->nullable()->after('engine_cc');
            $table->string('color')->nullable()->after('fuel_type');
            $table->integer('doors')->nullable()->after('color');
            $table->integer('seats')->nullable()->after('doors');
            $table->string('dimension')->nullable()->after('seats'); // Format: 339 X 147 X 179
            $table->json('additional_features')->nullable()->after('dimension'); // Array of features
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'stock_id',
                'chassis_number',
                'model_code',
                'year_month',
                'grade',
                'body_style',
                'mileage',
                'transmission',
                'engine_cc',
                'fuel_type',
                'color',
                'doors',
                'seats',
                'dimension',
                'additional_features',
            ]);
        });
    }
};
