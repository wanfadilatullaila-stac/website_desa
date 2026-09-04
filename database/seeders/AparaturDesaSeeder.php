<?php

namespace Database\Seeders;

use App\Models\AparaturDesa;
use Illuminate\Database\Seeder;

class AparaturDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AparaturDesa::truncate();

        $aparaturs = [
            ['nama' => 'Muslich', 'jabatan' => 'Kepala Desa', 'nip' => '-', 'kontak' => '0812-7685-2821', 'foto' => 'images/kepala-desa.png', 'urutan' => 1],
            ['nama' => 'Imbuh Haryanto', 'jabatan' => 'Ketua RW 01', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 2],
            ['nama' => 'Andi', 'jabatan' => 'Ketua RT 01', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 3],
            ['nama' => 'Johari', 'jabatan' => 'Ketua RT 02', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 4],
            ['nama' => 'Yazid', 'jabatan' => 'Ketua RW 02', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 5],
            ['nama' => 'Kadarma Putra', 'jabatan' => 'Ketua RT 03', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 6],
            ['nama' => 'Yuri', 'jabatan' => 'Ketua RT 04', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 7],
            ['nama' => 'Epy Syafrizal', 'jabatan' => 'Ketua RW 03', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 8],
            ['nama' => 'Darus', 'jabatan' => 'Ketua RT 05', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 9],
            ['nama' => 'Anuar. K', 'jabatan' => 'Ketua RT 06', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 10],
            ['nama' => 'Zainal', 'jabatan' => 'Ketua RW 04', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 11],
            ['nama' => 'Andi', 'jabatan' => 'Ketua RT 07', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 12],
            ['nama' => 'Karsono', 'jabatan' => 'Ketua RT 08', 'nip' => '-', 'kontak' => '-', 'foto' => null, 'urutan' => 13],
        ];

        foreach ($aparaturs as $item) {
            AparaturDesa::create($item);
        }
    }
}
