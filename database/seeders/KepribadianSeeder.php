<?php

namespace Database\Seeders;

use App\Models\detail_kepribadian;
use App\Models\Kepribadian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KepribadianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kepribadians = [
            [
                'id_kategori' => 1,
                'sub_indikator' => 'Hormat dan patuh kepada guru serta pembina asrama',
            ],
            [
                'id_kategori' => 1,
                'sub_indikator' => 'Berbicara sopan kepada guru serta pembina asrama',
            ],
            [
                'id_kategori' => 2,
                'sub_indikator' => 'kasih sayang sesama teman',
            ],
            [
                'id_kategori' => 2,
                'sub_indikator' => 'tidak berkelahi dengan teman',
            ],
            [
                'id_kategori' => 2,
                'sub_indikator' => 'saling meminta dan memaafkan',
            ],
            [
                'id_kategori' => 2,
                'sub_indikator' => 'tidak merusak/mengambil hak milik teman',
            ],
            [
                'id_kategori' => 3,
                'sub_indikator' => 'mengerjakan tugas mufrodat sampai selesai',
            ],
            [
                'id_kategori' => 3,
                'sub_indikator' => 'belajar dengan tertib',
            ],
            [
                'id_kategori' => 3,
                'sub_indikator' => 'bersemangat/antusias mengikuti pelajaran',
            ],
        
        ];

        // Insert data into the database
        foreach ($kepribadians as $kepribadian) {
            Kepribadian::create($kepribadian);
        }
    }
}
