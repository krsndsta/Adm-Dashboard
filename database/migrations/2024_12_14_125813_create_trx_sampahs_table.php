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
        Schema::create('trx_sampah', function (Blueprint $table) {
            $table->id();
            $table->float('kenaikan_sampah_organik');
            $table->float('kenaikan_sampah_anorganik'); 
            $table->float('total_sampah');
            $table->dateTime('dateTime')->useCurrent(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_sampah');
    }
};
