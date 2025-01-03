<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;
use function PHPUnit\Framework\once;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_asset', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('tipe_asset_id');
            $table->foreign('tipe_asset_id')->references('id')->on('m_tipe_asset')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_asset');
    }
};
