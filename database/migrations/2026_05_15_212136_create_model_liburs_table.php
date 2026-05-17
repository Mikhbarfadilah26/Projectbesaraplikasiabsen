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
        Schema::create('libur', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | TANGGAL LIBUR
            |--------------------------------------------------------------------------
            */

            $table->date('tanggal');

            /*
            |--------------------------------------------------------------------------
            | KETERANGAN
            |--------------------------------------------------------------------------
            */

            $table->string('keterangan');

            /*
            |--------------------------------------------------------------------------
            | JENIS LIBUR
            |--------------------------------------------------------------------------
            */

            $table->enum('jenis', [

                'nasional',
                'sekolah'

            ])->default('nasional');

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $table->boolean('aktif')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libur');
    }
};