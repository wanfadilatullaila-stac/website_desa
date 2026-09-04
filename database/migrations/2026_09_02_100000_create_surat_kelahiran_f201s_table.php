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
        Schema::create('surat_kelahiran_f201s', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();

            // Header & Wilayah
            $table->string('pemerintah_desa')->default('Desa Lubuk Mandian Gajah');
            $table->string('kecamatan')->default('Bunut');
            $table->string('kabupaten')->default('Pelalawan');
            $table->string('kode_wilayah')->nullable();
            $table->string('nama_kepala_keluarga');
            $table->string('no_kk', 16);

            // 1. DATA BAYI / ANAK
            $table->string('nama_anak');
            $table->string('jenis_kelamin_anak'); // 1: Laki-laki, 2: Perempuan
            $table->string('tempat_dilahirkan'); // 1: RS/RB, 2: Puskesmas, 3: Polindes, 4: Rumah, 5: Lainnya
            $table->string('tempat_kelahiran'); // Kota/Kabupaten lahir
            $table->string('hari_lahir');
            $table->date('tanggal_lahir');
            $table->string('pukul_lahir')->nullable(); // Jam:Menit
            $table->string('jenis_kelahiran'); // 1: Tunggal, 2: Kembar 2, 3: Kembar 3, 4: Kembar 4, 5: Lainnya
            $table->integer('kelahiran_ke')->nullable();
            $table->string('penolong_kelahiran'); // 1: Dokter, 2: Bidan/Perawat, 3: Dukun, 4: Lainnya
            $table->string('berat_bayi')->nullable();
            $table->string('panjang_bayi')->nullable();

            // 2. DATA IBU
            $table->string('nik_ibu', 16);
            $table->string('nama_ibu');
            $table->date('tgl_lahir_ibu')->nullable();
            $table->integer('umur_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();
            $table->string('desa_ibu')->nullable();
            $table->string('kec_ibu')->nullable();
            $table->string('kab_ibu')->nullable();
            $table->string('prov_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->default('WNI');
            $table->string('kebangsaan_ibu')->nullable();
            $table->date('tgl_pencatatan_perkawinan')->nullable();

            // 3. DATA AYAH
            $table->string('nik_ayah', 16);
            $table->string('nama_ayah');
            $table->date('tgl_lahir_ayah')->nullable();
            $table->integer('umur_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->string('desa_ayah')->nullable();
            $table->string('kec_ayah')->nullable();
            $table->string('kab_ayah')->nullable();
            $table->string('prov_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->default('WNI');
            $table->string('kebangsaan_ayah')->nullable();

            // 4. DATA PELAPOR
            $table->string('nik_pelapor', 16);
            $table->string('nama_pelapor');
            $table->integer('umur_pelapor')->nullable();
            $table->string('jenis_kelamin_pelapor')->nullable();
            $table->string('pekerjaan_pelapor')->nullable();
            $table->text('alamat_pelapor')->nullable();
            $table->string('desa_pelapor')->nullable();
            $table->string('kec_pelapor')->nullable();
            $table->string('kab_pelapor')->nullable();
            $table->string('prov_pelapor')->nullable();

            // 5. DATA SAKSI I & SAKSI II
            $table->string('nik_saksi1', 16)->nullable();
            $table->string('nama_saksi1')->nullable();
            $table->integer('umur_saksi1')->nullable();
            $table->string('pekerjaan_saksi1')->nullable();
            $table->text('alamat_saksi1')->nullable();
            $table->string('desa_saksi1')->nullable();
            $table->string('kec_saksi1')->nullable();
            $table->string('kab_saksi1')->nullable();
            $table->string('prov_saksi1')->nullable();

            $table->string('nik_saksi2', 16)->nullable();
            $table->string('nama_saksi2')->nullable();
            $table->integer('umur_saksi2')->nullable();
            $table->string('pekerjaan_saksi2')->nullable();
            $table->text('alamat_saksi2')->nullable();
            $table->string('desa_saksi2')->nullable();
            $table->string('kec_saksi2')->nullable();
            $table->string('kab_saksi2')->nullable();
            $table->string('prov_saksi2')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kelahiran_f201s');
    }
};
