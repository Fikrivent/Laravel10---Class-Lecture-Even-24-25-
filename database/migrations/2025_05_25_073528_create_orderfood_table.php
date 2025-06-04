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
        Schema::create('table_dmorderfood', function (Blueprint $table) {
            $table->foreignId('food_id')->constrained(
                table: 'foods', indexName: 'orderfood_food_id'
            );
            $table->foreignId('order_id')->constrained(
                table: 'table_dmorders', indexName: 'orderfood_order_id'
            );
            $table->integer('quantity')->default(1);
            $table->primary(['food_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_dmorderfood');
    }
};
