<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mapel',
        'id_rapor',
        'nilai',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function rapor()
    {
        return $this->belongsTo(Rapor::class, 'id_rapor');
    }
}
