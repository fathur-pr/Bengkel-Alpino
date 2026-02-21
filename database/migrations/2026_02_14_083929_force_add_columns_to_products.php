<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::table('products', function ($table) {
        if (!Schema::hasColumn('products', 'engine_type')) {
            $table->string('engine_type')->default('bensin')->after('harga');
        }
        if (!Schema::hasColumn('products', 'component_type')) {
            $table->string('component_type')->nullable()->after('engine_type');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
