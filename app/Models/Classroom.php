<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tahun_ajaran',
    ];


    public function santris()
    {
        return $this->hasMany(Santri::class, 'id_classroom');
    }

    public function kelasMapels()
    {
        return $this->hasMany(KelasMapel::class, 'id_classroom');
    }

    public function mapels(){
        return $this->hasMany(Mapel::class, 'id_classroom');
    }
}
