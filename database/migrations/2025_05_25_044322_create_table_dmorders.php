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
        Schema::create('table_dmorders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order', 1000);
            $table->string('kode_promo', 1000)->nullable();
            $table->float('total_orders_rp', 8, 2);
            $table->integer('num_of_items');
            $table->dateTime('tanggal_order', $precision = 0)->nullable();
            $table->foreignId('customer_id')->constrained(
                table: 'users', indexName: 'order_customer_id'
            );
            $table->foreignId('staff_id')->constrained(
                table: 'users', indexName: 'order_staff_id'
            );

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_dmorders');
    }
};
