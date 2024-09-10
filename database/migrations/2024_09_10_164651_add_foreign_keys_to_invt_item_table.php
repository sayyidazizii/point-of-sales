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
        Schema::table('invt_item', function (Blueprint $table) {
            $table->foreign(['item_category_id'], 'FK_category_id')->references(['item_category_id'])->on('invt_item_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['item_unit_id'], 'FK_item_unit_id')->references(['item_unit_id'])->on('invt_item_unit')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invt_item', function (Blueprint $table) {
            $table->dropForeign('FK_category_id');
            $table->dropForeign('FK_item_unit_id');
        });
    }
};
