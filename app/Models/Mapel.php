<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    ['id_classroom','nama', 'type'];


    
    public function detailMapels()
    {
        return $this->hashMany(DetailMapel::class, 'id_mapel');
    }

    public function KelasMapels(){
        return $this->hasMany(KelasMapel::class, 'id_mapel');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }



    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ekstrakulikuler' => 'boolean',
    ];
}
