<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindahF129 extends Model
{
    use HasFactory;

    protected $table = 'surat_pindah_f129s';

    protected $guarded = ['id'];

    protected $casts = [
        'anggota_keluarga' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
