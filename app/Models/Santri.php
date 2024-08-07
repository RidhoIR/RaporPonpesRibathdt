<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_classroom',
        'nomor_induk',
        'nama',
        'nama_wali',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'tahun_masuk'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }

    public function rapors()
    {
        return $this->hasMany(Rapor::class, 'id_santri');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tahun_masuk' => 'integer',
    ];
}
