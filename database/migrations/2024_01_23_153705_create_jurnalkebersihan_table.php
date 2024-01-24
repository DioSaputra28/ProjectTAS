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
        Schema::create('jurnalkebersihan', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->integer('idjadwal');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('foto');
            $table->text('keterangan');
            $table->enum('validasi',[1,0])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnalkebersihan');
    }
};
