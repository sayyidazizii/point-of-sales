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
        Schema::table('sales_invoice_item', function (Blueprint $table) {
            $table->foreign(['item_category_id'], 'FK_sales_invoice_category')->references(['item_category_id'])->on('invt_item_category')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['sales_invoice_id'], 'FK_sales_invoice_id')->references(['sales_invoice_id'])->on('sales_invoice')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['item_id'], 'FK_sales_invoice_item')->references(['item_id'])->on('invt_item')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['item_unit_id'], 'FK_sales_invoice_unit')->references(['item_unit_id'])->on('invt_item_unit')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_invoice_item', function (Blueprint $table) {
            $table->dropForeign('FK_sales_invoice_category');
            $table->dropForeign('FK_sales_invoice_id');
            $table->dropForeign('FK_sales_invoice_item');
            $table->dropForeign('FK_sales_invoice_unit');
        });
    }
};
