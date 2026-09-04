<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindahF125 extends Model
{
    use HasFactory;

    protected $table = 'surat_pindah_f125s';

    protected $guarded = ['id'];

    protected $casts = [
        'anggota_keluarga' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
