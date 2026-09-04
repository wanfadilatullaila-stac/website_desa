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
        Schema::create('biodata_keluarga_f101s', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_blangko')->default('F-1.01');

            // DATA KEPALA KELUARGA & ALAMAT
            $table->string('nama_kepala_keluarga');
            $table->text('alamat_keluarga');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->integer('jumlah_anggota_keluarga')->default(1);
            $table->string('kode_pos', 5)->nullable();
            $table->string('telepon')->nullable();

            // Kode Wilayah & Nama (Diisi Petugas / Default)
            $table->string('kode_provinsi')->default('14');
            $table->string('nama_provinsi')->default('RIAU');
            $table->string('kode_kabupaten')->default('04');
            $table->string('nama_kabupaten')->default('PELALAWAN');
            $table->string('kode_kecamatan')->default('06');
            $table->string('nama_kecamatan')->default('BUNUT');
            $table->string('kode_desa')->default('2005');
            $table->string('nama_desa')->default('LUBUK MANDIAN GAJAH');
            $table->string('dusun_dukuh_kampung')->nullable();

            // DATA ANGGOTA KELUARGA (Matriks Disdukcapil JSON)
            $table->json('anggota_keluarga')->nullable();

            // TANDA TANGAN & PENGESAHAN
            $table->string('nama_ketua_rt')->nullable();
            $table->string('nama_ketua_rw')->nullable();
            $table->string('nama_petugas_registrasi')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_keluarga_f101s');
    }
};
