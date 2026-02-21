<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Kita cek, kalau kolom belum ada baru kita tambahkan
            if (!Schema::hasColumn('products', 'engine_type')) {
                $table->string('engine_type')->default('bensin')->after('harga');
            }
            if (!Schema::hasColumn('products', 'component_type')) {
                $table->string('component_type')->nullable()->after('engine_type');
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['engine_type', 'component_type']);
        });
    }
};