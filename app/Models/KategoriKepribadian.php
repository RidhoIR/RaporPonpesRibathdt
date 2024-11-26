<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKepribadian extends Model
{
    use HasFactory;

    protected $fillable = [
        'indikator_kepribadian'
    ];

    public function kepribadians()
    {
        return $this->hasMany(Kepribadian::class, 'id_indikator', 'id');
    }
}
