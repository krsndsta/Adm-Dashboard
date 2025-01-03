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
        Schema::create('trx_asset', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pemantauan', ['BERGERAK', 'TIDAK_BERGERAK']);
            $table->integer('jumlah_baik');
            $table->integer('jumlah_kurang_baik');
            $table->dateTime('dateTime')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_assets');
    }
};
