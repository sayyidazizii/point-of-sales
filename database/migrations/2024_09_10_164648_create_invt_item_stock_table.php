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
        Schema::create('invt_item_stock', function (Blueprint $table) {
            $table->integer('item_stock_id', true);
            $table->integer('company_id')->nullable();
            $table->integer('warehouse_id')->nullable()->index('fk_warehouse_id_stock');
            $table->integer('item_id')->nullable()->index('fk_item_id_stock');
            $table->integer('item_unit_id')->nullable()->index('fk_item_unit_id_stock');
            $table->integer('item_category_id')->nullable()->index('fk_item_category_stock');
            $table->integer('last_balance')->nullable();
            $table->dateTime('last_update')->nullable();
            $table->integer('data_state')->nullable()->default(0);
            $table->dateTime('updated_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->integer('created_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invt_item_stock');
    }
};
