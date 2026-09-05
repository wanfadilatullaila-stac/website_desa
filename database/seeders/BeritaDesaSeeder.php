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
                'ringkasan' => 'Suasana hangat dan keceriaan warga Desa Lubuk Mandian Gajah saat tradisi menangguk ikan bersama di sore hari untuk mempererat tali silaturahmi.',
                'isi_berita' => "Suasana hangat dan penuh keceriaan menyelimuti aliran parit dan rawa Desa Lubuk Mandian Gajah pada sore hari kemarin. Puluhan warga dari berbagai dusun tampak antusias turun langsung ke air membawa tangguk (alat jaring tradisional berbahan bambu dan jaring) untuk menangkap ikan air tawar bersama-sama.\n\nKegiatan menangguk ikan bersama ini bukan sekadar mencari lauk segar untuk keluarga, melainkan tradisi turun-temurun yang rutin dilakukan saat kondisi air surut. Selain menjaga kearifan lokal dalam memanfaatkan sumber daya alam secara ramah lingkungan tanpa bahan kimia atau setrum, momen sore hari ini menjadi wadah berharga untuk mempererat tali silaturahmi, gotong royong, dan rasa kekeluargaan antarwarga desa.\n\nPemerintah Desa Lubuk Mandian Gajah sangat mengapresiasi kebersamaan ini dan terus mengimbau seluruh masyarakat untuk menjaga kebersihan ekosistem perairan desa agar kekayaan alam lokal tetap lestari dan dapat dinikmati oleh generasi mendatang.",
            ]
        );

        BeritaDesa::updateOrCreate(
            ['slug' => 'pelayanan-posyandu-rutin-setiap-tanggal-15-wujud-komitmen-cegah-stunting'],
            [
                'judul' => 'Pelayanan Posyandu Rutin Setiap Tanggal 15 Wujud Komitmen Cegah Stunting dan Jaga Kesehatan Warga Desa',
                'penulis' => 'Kader Kesehatan & Bidan Desa',
                'tanggal_publikasi' => '2026-09-05',
                'kategori' => 'Kesehatan',
                'gambar' => null,
                'ringkasan' => 'Pemerintah Desa Lubuk Mandian Gajah secara konsisten menggelar pelayanan Posyandu rutin setiap tanggal 15 untuk pemantauan balita, PMT, imunisasi, dan skrining lansia.',
                'isi_berita' => "Pemerintah desa bersama para kader kesehatan dan tenaga medis Puskesmas secara konsisten menggelar pelayanan Pos Pelayanan Terpadu (Posyandu) rutin setiap tanggal 15 tiap bulannya. Langkah ini merupakan komitmen nyata pemerintah desa dalam memantau tumbuh kembang anak, menekan risiko gagal tumbuh (stunting) sejak dini, serta memastikan derajat kesehatan masyarakat dari balita hingga lansia tetap terjaga prima.\n\nKegiatan posyandu yang berlangsung di balai desa ini mencakup sejumlah rangkaian pemeriksaan kesehatan:\n\n1. Pemantauan Pertumbuhan Balita: Penimbangan berat badan, pengukuran tinggi badan, serta lingkar kepala yang dicatat langsung pada buku KIA/KMS guna memastikan kurva pertumbuhan fisik anak berlangsung normal.\n2. Pemberian Makanan Tambahan (PMT): Penyaluran paket nutrisi bergizi seimbang berbahan pangan lokal tinggi protein untuk menunjang kebutuhan nutrisi harian balita.\n3. Imunisasi & Suplementasi: Pemberian imunisasi berkala sesuai usia serta distribusi vitamin A dan obat cacing secara teratur.\n4. Skrining Lansia: Pengukuran tekanan darah, pengecekan berat badan, serta konsultasi pola hidup sehat bagi warga lanjut usia.\n\nPemerintah desa dan bidan desa terus mengimbau seluruh orang tua yang memiliki balita untuk hadir secara disiplin setiap tanggal 15 demi mewujudkan masa depan generasi desa yang sehat, aktif, dan berkualitas.",
            ]
        );
    }
}
