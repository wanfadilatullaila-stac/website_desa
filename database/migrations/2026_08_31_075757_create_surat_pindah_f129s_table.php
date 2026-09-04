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
        Schema::create('surat_pindah_f129s', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();

            // Header Wilayah Pembuat
            $table->string('prov_pembuat')->default('RIAU');
            $table->string('kab_pembuat')->default('PELALAWAN');
            $table->string('kec_pembuat')->default('BUNUT');
            $table->string('desa_pembuat')->default('LUBUK MANDIAN GAJAH');
            $table->string('dusun_pembuat')->nullable();

            // Data Daerah Asal
            $table->string('no_kk_asal', 16);
            $table->string('nama_kepala_keluarga');
            $table->text('alamat_asal')->nullable();
            $table->string('rt_asal', 3)->nullable();
            $table->string('rw_asal', 3)->nullable();
            $table->string('dusun_asal')->nullable();
            $table->string('desa_asal')->nullable();
            $table->string('kec_asal')->nullable();
            $table->string('kab_asal')->nullable();
            $table->string('prov_asal')->nullable();
            $table->string('kodepos_asal', 5)->nullable();
            $table->string('telepon_asal')->nullable();
            $table->string('nik_pemohon', 16);
            $table->string('nama_pemohon');

            // Data Kepindahan
            $table->string('alasan_pindah');
            $table->string('alasan_pindah_lainnya')->nullable();
            $table->text('alamat_tujuan')->nullable();
            $table->string('rt_tujuan', 3)->nullable();
            $table->string('rw_tujuan', 3)->nullable();
            $table->string('dusun_tujuan')->nullable();
            $table->string('desa_tujuan')->nullable();
            $table->string('kec_tujuan')->nullable();
            $table->string('kab_tujuan')->nullable();
            $table->string('prov_tujuan')->nullable();
            $table->string('kodepos_tujuan', 5)->nullable();
            $table->string('telepon_tujuan')->nullable();

            $table->string('jenis_kepindahan');
            $table->string('status_kk_tidak_pindah')->nullable();
            $table->string('status_kk_pindah');

            // Data Anggota Keluarga (JSON)
            $table->json('anggota_keluarga')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pindah_f129s');
    }
};
