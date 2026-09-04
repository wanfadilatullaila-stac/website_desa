<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPindah extends Model
{
    use HasFactory;

    protected $table = 'surat_pindahs';

    protected $guarded = ['id'];

    protected $casts = [
        'anggota_keluarga' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
