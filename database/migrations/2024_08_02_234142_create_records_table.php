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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('umur');
            $table->string('populasi');
            $table->string('mati')->nullable();
            $table->string('afkir')->nullable();
            $table->string('pakan');
            $table->string('produksi');
            $table->string('berat');
            $table->string('butir');
            $table->string('retakKg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
