<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'sub_indikator',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriKepribadian::class, 'id_kategori', 'id');
    }
}
