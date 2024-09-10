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
        Schema::table('invt_item_stock', function (Blueprint $table) {
            $table->foreign(['item_category_id'], 'FK_item_category_stock')->references(['item_category_id'])->on('invt_item_category')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['item_id'], 'FK_item_id_stock')->references(['item_id'])->on('invt_item')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['item_unit_id'], 'FK_item_unit_id_stock')->references(['item_unit_id'])->on('invt_item_unit')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['warehouse_id'], 'Fk_warehouse_id_stock')->references(['warehouse_id'])->on('invt_warehouse')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invt_item_stock', function (Blueprint $table) {
            $table->dropForeign('FK_item_category_stock');
            $table->dropForeign('FK_item_id_stock');
            $table->dropForeign('FK_item_unit_id_stock');
            $table->dropForeign('Fk_warehouse_id_stock');
        });
    }
};
