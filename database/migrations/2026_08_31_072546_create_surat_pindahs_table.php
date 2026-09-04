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
        Schema::create('surat_pindahs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();

            // Data Wilayah Desa Pembuat
            $table->string('prov_asal')->default('RIAU');
            $table->string('kab_asal')->default('PELALAWAN');
            $table->string('kec_asal')->default('BUNUT');
            $table->string('desa_asal')->default('LUBUK MANDIAN GAJAH');
            $table->string('dusun_asal')->nullable();

            // Data Daerah Asal
            $table->string('no_kk_asal', 16);
            $table->string('nama_kepala_keluarga');
            $table->text('alamat_asal')->nullable();
            $table->string('rt_asal', 10)->nullable();
            $table->string('rw_asal', 10)->nullable();
            $table->string('kodepos_asal', 10)->nullable();
            $table->string('telepon_asal', 20)->nullable();
            $table->string('nik_pemohon', 16);
            $table->string('nama_pemohon');

            // Data Kepindahan
            $table->string('alasan_pindah');
            $table->text('alamat_tujuan')->nullable();
            $table->string('rt_tujuan', 10)->nullable();
            $table->string('rw_tujuan', 10)->nullable();
            $table->string('dusun_tujuan')->nullable();
            $table->string('desa_tujuan')->nullable();
            $table->string('kec_tujuan')->nullable();
            $table->string('kab_tujuan')->nullable();
            $table->string('prov_tujuan')->nullable();
            $table->string('kodepos_tujuan', 10)->nullable();
            $table->string('telepon_tujuan', 20)->nullable();

            $table->string('jenis_kepindahan');
            $table->string('status_kk_tidak_pindah')->nullable();
            $table->string('status_kk_pindah');

            // Data Anggota Keluarga yang Pindah (JSON array)
            $table->json('anggota_keluarga')->nullable();

            // Foreign Key User
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pindahs');
    }
};
