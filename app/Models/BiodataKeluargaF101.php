<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataKeluargaF101 extends Model
{
    use HasFactory;

    protected $table = 'biodata_keluarga_f101s';

    protected $fillable = [
        'nomor_blangko',
        'nomor_surat',
        'nama_kepala_keluarga',
        'alamat_keluarga',
        'rt',
        'rw',
        'jumlah_anggota_keluarga',
        'kode_pos',
        'telepon',
        'kode_provinsi',
        'nama_provinsi',
        'kode_kabupaten',
        'nama_kabupaten',
        'kode_kecamatan',
        'nama_kecamatan',
        'kode_desa',
        'nama_desa',
        'dusun_dukuh_kampung',
        'anggota_keluarga',
        'nama_ketua_rt',
        'nama_ketua_rw',
        'nama_petugas_registrasi',
        'user_id',
    ];

    protected $casts = [
        'anggota_keluarga' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
