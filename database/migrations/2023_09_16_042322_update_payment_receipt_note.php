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
        // Payment
        Schema::table('payments', function (Blueprint $table) {
            $table->string('note')->nullable()->change();
        });

        // Receipt
        Schema::table('receipts', function (Blueprint $table) {
            $table->string('note')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Payment
        Schema::table('payments', function (Blueprint $table) {
            $table->string('note')->change();
        });

        // Receipt
        Schema::table('receipt', function (Blueprint $table) {
            $table->string('note')->change();
        });
    }
};
