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
        Schema::create('sales_invoice', function (Blueprint $table) {
            $table->integer('sales_invoice_id', true);
            $table->integer('company_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->integer('customer_id')->nullable()->default(0);
            $table->string('sales_invoice_no', 225)->nullable();
            $table->string('sales_invoice_date', 225)->nullable();
            $table->string('subtotal_item', 225)->nullable();
            $table->string('subtotal_amount', 225)->nullable();
            $table->string('discount_percentage_total', 225)->nullable();
            $table->string('discount_amount_total', 225)->nullable();
            $table->decimal('ppn_percentage_total', 20)->nullable()->default(0);
            $table->decimal('ppn_amount_total', 20)->nullable()->default(0);
            $table->string('total_amount', 225)->nullable();
            $table->string('shortover_amount')->nullable();
            $table->string('owing_amount')->nullable();
            $table->string('paid_amount', 225)->nullable();
            $table->string('change_amount', 225)->nullable();
            $table->string('last_balance')->nullable();
            $table->string('table_no', 250)->nullable();
            $table->integer('payment_method')->nullable()->comment('1 = Cash/Tunai. 2 = Non Tunai/Tempo. 3 >= Tunai metode e-wallet');
            $table->integer('data_state')->nullable()->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('created_id')->nullable();
            $table->integer('updated_id')->nullable();
            $table->integer('sales_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoice');
    }
};
