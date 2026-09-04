<?php

namespace Database\Seeders;

use App\Models\BeritaDesa;
use Illuminate\Database\Seeder;

class BeritaDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BeritaDesa::updateOrCreate(
            ['slug' => 'semarak-tradisi-menangguk-ikan-sore-hari-warga-lubuk-mandian-gajah'],
            [
                'judul' => 'Semarak Tradisi Menangguk Ikan Sore Hari Pererat Silaturahmi dan Kebersamaan Warga Lubuk Mandian Gajah',
                'penulis' => 'Humas Desa Lubuk Mandian Gajah',
                'tanggal_publikasi' => '2026-09-02',
                'kategori' => 'Sosial & Budaya',
                'gambar' => 'uploads/menangguk-ikan.png',
                'isi_berita' => "Suasana hangat dan penuh keceriaan menyelimuti aliran parit dan rawa Desa Lubuk Mandian Gajah pada sore hari kemarin. Puluhan warga dari berbagai dusun tampak antusias turun langsung ke air membawa tangguk (alat jaring tradisional berbahan bambu dan jaring) untuk menangkap ikan air tawar bersama-sama.\n\nKegiatan menangguk ikan bersama ini bukan sekadar mencari lauk segar untuk keluarga, melainkan tradisi turun-temurun yang rutin dilakukan saat kondisi air surut. Selain menjaga kearifan lokal dalam memanfaatkan sumber daya alam secara ramah lingkungan tanpa bahan kimia atau setrum, momen sore hari ini menjadi wadah berharga untuk mempererat tali silaturahmi, gotong royong, dan rasa kekeluargaan antarwarga desa.\n\nPemerintah Desa Lubuk Mandian Gajah sangat mengapresiasi kebersamaan ini dan terus mengimbau seluruh masyarakat untuk menjaga kebersihan ekosistem perairan desa agar kekayaan alam lokal tetap lestari dan dapat dinikmati oleh generasi mendatang.",
            ]
        );
    }
}
