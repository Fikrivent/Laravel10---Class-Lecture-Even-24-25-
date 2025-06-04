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
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('dob', $precision = 0)->nullable();
            $table->dateTime('tanggal_jadi_member', $precision = 0)->nullable();
            $table->enum('status_member', ['silver', 'gold','platinum'])->default('silver');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['dob', 'tanggal_jadi_member', 'status_member']);
        });
    }
};
