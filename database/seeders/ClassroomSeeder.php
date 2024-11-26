<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classroom = [
            [
                'nama' => 'Tiddal',
                'tahun_ajaran' => '2023',
            ],
            [
                'nama' => 'Sughro',
                'tahun_ajaran' => '2024',
                // 'tahun_ajaran_hijriah' => '1445', // Correct column name
            ],
            [
                'nama' => 'Kubro',
                'tahun_ajaran' => '2023',
                // 'tahun_ajaran_hijriah' => '1444', // Correct column name
            ],
            [
                'nama' => 'Wustho',
                'tahun_ajaran' => '2025',
                // 'tahun_ajaran_hijriah' => '1444', // Correct column name
            ],
        ];
        foreach ($classroom as $classroom) {
            Classroom::create($classroom);
        }
    }
}
