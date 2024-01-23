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
        Schema::create('jurnalkegiatan', function (Blueprint $table) {
            $table->id();
            $table->integer('iduser');
            $table->date('tanggal');
            $table->text('kegiatan');
            $table->enum('validasi',[1,0])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalkegiatan');
    }
};
