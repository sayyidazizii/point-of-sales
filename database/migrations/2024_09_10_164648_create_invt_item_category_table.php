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
        Schema::create('invt_item_category', function (Blueprint $table) {
            $table->integer('item_category_id', true);
            $table->integer('company_id')->nullable();
            $table->string('item_category_code', 50)->nullable();
            $table->string('item_category_name')->nullable();
            $table->string('item_category_remark')->nullable();
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
        Schema::dropIfExists('invt_item_category');
    }
};