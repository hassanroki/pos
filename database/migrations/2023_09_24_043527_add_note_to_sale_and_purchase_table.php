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
        // Sale Invoice Table Column Add
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });

        // Purchase Invoice Table Column Add
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Sale Invoice Table Column Drop
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });

        // Purchase Invoice Table Column Drop
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
};
