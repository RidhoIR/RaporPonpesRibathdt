<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_santri',
        'semester',
        'tahun_ajaran',
        'jumlah_nilai',
        'rata_rata_nilai',
        'peringkat',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'id_santri');
    }

    public function detailMapels()
    {
        return $this->hasMany(DetailMapel::class, 'id_rapor');
    }

    public function detailMapelsEkstrakurikuler()
    {
        return $this->hasMany(DetailMapel::class, 'id_rapor')->whereHas('mapel', function ($query) {
            $query->where('type', 'ekskul');
        });
    }

    public function detailMapelsMatapelajaran()
    {
        return $this->hasMany(DetailMapel::class, 'id_rapor')->whereHas('mapel', function ($query) {
            $query->where('type', 'mapel');
        });
    }
}
