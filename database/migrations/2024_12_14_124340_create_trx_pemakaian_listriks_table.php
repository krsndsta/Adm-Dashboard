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
        Schema::create('trx_pemakaian_listrik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_listrik_id');
            $table->float('nilai');
            $table->dateTime('dateTime')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_pemakaian_listrik');
    }
};
