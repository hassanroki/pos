<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $data = [
            'name' => 'Md Rokibul Hassan',
            'email' => 'rokibul@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'phone' => '01770910017'
        ];
        
        Admin::create($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
