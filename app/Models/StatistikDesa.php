<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'jumlah',
        'kategori',
        'ikon',
        'urutan',
    ];
}
