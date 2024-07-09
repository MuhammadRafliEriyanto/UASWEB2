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
        Schema::create('chipsets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // alternatif_id
            $table->bigInteger('alternatif_id')->unsigned();
            $table->foreign('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade');
            $table->string('jumlah_clock_prosesor', 100);
            $table->string('jumlah_inti_cores', 100);
            $table->string('jumlah_thread', 100);
            $table->string('kinerja_grafis_cpu', 100);
            $table->string('harga', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chipsets');
    }
};
