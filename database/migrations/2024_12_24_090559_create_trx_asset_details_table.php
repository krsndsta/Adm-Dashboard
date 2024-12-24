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
        Schema::create('trx_asset_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('pemantauan_id');
            $table->unsignedBigInteger('asset_id');
            $table->enum('status', ['BAIK', 'KURANG_BAIK']);

            $table->foreign('pemantauan_id')->references('id')->on('trx_asset')->cascadeOnDelete();
            $table->foreign('asset_id')->references('id')->on('m_asset')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_asset_details');
    }
};
