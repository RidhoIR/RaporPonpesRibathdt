<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_kepribadian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kepribadian',
        'id_rapor',
        'nilai'
    ];

    public function kepribadian()
    {
        return $this->belongsTo(Kepribadian::class, 'id_kepribadian');
    }

    public function rapor()
    {
        return $this->belongsTo(Rapor::class, 'id_rapor');
    }


}
