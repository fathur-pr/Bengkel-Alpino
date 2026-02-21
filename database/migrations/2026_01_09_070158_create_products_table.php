<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('nama_produk');
        $table->integer('harga');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable(); // Menyimpan nama file foto
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
