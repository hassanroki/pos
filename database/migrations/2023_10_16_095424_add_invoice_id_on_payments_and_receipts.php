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
        // Receipts Table Add Sale Invoice Id
        Schema::table('receipts', function( Blueprint $table ) {
            $table->foreignId('sale_invoice_id')->nullable()->after('user_id');
        });

        // Payments Table Add Purchase Invoice Id
        Schema::table('payments', function( Blueprint $table ) {
            $table->foreignId('purchase_invoice_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Receipts Table Sale Invoice Id Delete
        Schema::table('receipts', function( Blueprint $table ) {
            $table->dropColumn('sale_invoice_id');
        });

        // Payments Table Purchase Invoice Id Delete
        Schema::table('payments', function( Blueprint $table ) {
            $table->dropColumn('purchase_invoice_id');
        });
    }
};
