<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapels = [
            [
                'id_classroom' => 1,
                'nama' => 'Akhlak',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Pego',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Tauhid',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Fiqih',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Aqidatul Awwam',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Hadits',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Fasholatan',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'hafalan al quran',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Bahasa Arab',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Sughro
            [
                'id_classroom' => 2,
                'nama' => 'Akhlak',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Pego',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Tauhid',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Fiqih',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Aqidatul Awwam',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Hadits',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2,
                'nama' => 'Fasholatan',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //kubro
            [
                'id_classroom' => 3,
                'nama' => 'Tarekh',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 3,
                'nama' => 'Akhlak',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 3,
                'nama' => 'Fiqih',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 3,
                'nama' => 'Hadist',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 3,
                'nama' => 'Hafalan Al-Qur\'an',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //wustho
            [
                'id_classroom' => 4,
                'nama' => 'Tarekh',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 4,
                'nama' => 'Akhlak',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 4,
                'nama' => 'Fiqih',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 4,
                'nama' => 'Shorof',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 4,
                'nama' => 'Hafalan Al-Qur\'an',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the database
        foreach ($mapels as $mapel) {
            Mapel::create($mapel);
        }

        //Testing 2,5k data gakuat cik wkwkwk
        // for ($i = 1; $i <= 2500; $i++) {
        //     Mapel::create([
        //         'nama' => 'Mapel ' . $i,
        //         'keterangan' => 'Keterangan Mapel ' . $i,
        //         'ekstrakulikuler' => $i % 2 == 0 ? true : false, // Contoh pengaturan ekstrakulikuler (genap true, ganjil false)
        //     ]);
        // }

        //Testing 500 data kuat boy
        // for ($i = 1; $i <= 500; $i++) {
        //     Mapel::create([
        //         'nama' => 'Mapel ' . $i,
        //         'keterangan' => 'Keterangan Mapel ' . $i,
        //         'ekstrakulikuler' => $i % 2 == 0 ? true : false, // Contoh pengaturan ekstrakulikuler (genap true, ganjil false)
        //     ]);
        // }
    }
}
