<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom divisi dan jabatan (nullable artinya boleh kosong)
            $table->string('divisi')->nullable()->after('email');
            $table->string('jabatan')->nullable()->after('divisi');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['divisi', 'jabatan']);
        });
    }
};