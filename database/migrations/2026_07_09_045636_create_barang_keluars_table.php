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
        Schema::create('barang_keluars', function (Blueprint $table) {


$table->id();


$table->foreignId('barang_id')
->constrained()
->cascadeOnDelete();


$table->date('tanggal');


$table->integer('jumlah');


$table->string('digunakan_oleh');


$table->text('keperluan');


$table->timestamps();


});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
