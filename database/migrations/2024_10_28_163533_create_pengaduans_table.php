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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status')->constrained('statuses')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tiket');
            $table->string('nama_pelapor');
            $table->string('alamat_pelapor');
            $table->bigInteger('no_hp_pelapor');
            $table->string('email_pelapor');
            $table->longText('kronologi');
            $table->date('waktu_pelanggaran');
            $table->string('tempat_pelanggaran');
            $table->string('jenis_pelanggaran');
            $table->longText('konsekuensi');
            $table->date('finish_date')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
