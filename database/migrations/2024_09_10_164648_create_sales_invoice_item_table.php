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
        Schema::create('sales_invoice_item', function (Blueprint $table) {
            $table->integer('sales_invoice_item_id', true);
            $table->integer('company_id')->nullable();
            $table->integer('sales_invoice_id')->nullable()->index('fk_sales_invoice_id');
            $table->integer('item_category_id')->nullable()->index('fk_sales_invoice_category');
            $table->integer('item_unit_id')->nullable()->index('fk_sales_invoice_unit');
            $table->integer('item_id')->nullable()->index('fk_sales_invoice_item');
            $table->string('quantity', 225)->nullable();
            $table->string('item_unit_price', 225)->nullable();
            $table->string('subtotal_amount', 225)->nullable();
            $table->string('discount_percentage', 225)->nullable();
            $table->string('discount_amount', 225)->nullable();
            $table->decimal('ppn_precentage', 20)->nullable()->default(0);
            $table->decimal('ppn_amount', 20)->nullable()->default(0);
            $table->string('subtotal_amount_after_discount', 225)->nullable();
            $table->string('item_remark', 250)->nullable();
            $table->integer('data_state')->nullable()->default(0);
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoice_item');
    }
};
