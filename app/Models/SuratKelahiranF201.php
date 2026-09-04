<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKelahiranF201 extends Model
{
    use HasFactory;

    protected $table = 'surat_kelahiran_f201s';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tgl_lahir_ibu' => 'date',
        'tgl_pencatatan_perkawinan' => 'date',
        'tgl_lahir_ayah' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
