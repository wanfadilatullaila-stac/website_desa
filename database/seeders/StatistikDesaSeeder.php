<?php

namespace Database\Seeders;

use App\Models\StatistikDesa;
use Illuminate\Database\Seeder;

class StatistikDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatistikDesa::truncate();

        $statistiks = [
            [
                'label' => 'Total Jiwa (Warga)',
                'jumlah' => '2.845',
                'kategori' => 'Kependudukan',
                'ikon' => 'users',
                'urutan' => 1,
            ],
            [
                'label' => 'Total Kepala Keluarga (KK)',
                'jumlah' => '742',
                'kategori' => 'Kependudukan',
                'ikon' => 'home',
                'urutan' => 2,
            ],
            [
                'label' => 'Jumlah Laki-laki',
                'jumlah' => '1.460',
                'kategori' => 'Kependudukan',
                'ikon' => 'user-male',
                'urutan' => 3,
            ],
            [
                'label' => 'Jumlah Perempuan',
                'jumlah' => '1.385',
                'kategori' => 'Kependudukan',
                'ikon' => 'user-female',
                'urutan' => 4,
            ],
            [
                'label' => 'Luas Wilayah Perkebunan',
                'jumlah' => '1.200 Ha',
                'kategori' => 'Wilayah',
                'ikon' => 'tree',
                'urutan' => 5,
            ],
            [
                'label' => 'Luas Pemukiman Warga',
                'jumlah' => '450 Ha',
                'kategori' => 'Wilayah',
                'ikon' => 'map-pin',
                'urutan' => 6,
            ],
        ];

        foreach ($statistiks as $item) {
            StatistikDesa::create($item);
        }
    }
}
