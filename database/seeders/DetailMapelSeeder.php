<?php

namespace Database\Seeders;

use App\Models\DetailMapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail = [
            [
                'id_mapel' => 1,
                'id_santri' => 1,
                'nilai' => 90,
                // 'tahun_ajaran_hijriah' => '1445', // Correct column name
            ],
            [
                'id_mapel' => 2,
                'id_santri' => 1,
                'nilai' => 90,
                // 'tahun_ajaran_hijriah' => '1444', // Correct column name
            ],
            [
                'id_mapel' => 1,
                'id_santri' => 2,
                'nilai' => 90,
                // 'tahun_ajaran_hijriah' => '1444', // Correct column name
            ],
        ];
        foreach ($detail as $detail) {
            DetailMapel::create($detail);
        }
    }
}
