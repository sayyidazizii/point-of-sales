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
        Schema::create('invt_item', function (Blueprint $table) {
            $table->integer('item_id', true);
            $table->integer('company_id')->nullable();
            $table->integer('item_category_id')->nullable()->index('fk_category_id');
            $table->integer('item_unit_id')->nullable()->index('fk_item_unit_id');
            $table->string('item_name')->nullable();
            $table->string('item_code', 50)->nullable();
            $table->string('item_barcode', 50)->nullable();
            $table->integer('item_status')->nullable()->default(0);
            $table->string('item_default_quantity', 100)->nullable();
            $table->string('item_unit_price', 225)->nullable()->default('0');
            $table->string('item_unit_cost', 225)->nullable()->default('0');
            $table->string('item_remark')->nullable();
            $table->integer('data_state')->nullable()->default(0);
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->integer('updated_id')->nullable();
            $table->integer('created_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invt_item');
    }
};
