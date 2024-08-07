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
                'nama' => 'Matematika',
                'keterangan' => 'Pelajaran Matematika',
                'type' => 'Mapel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Bahasa Indonesia',
                'keterangan' => 'Pelajaran Bahasa Indonesia',
                'type' => 'Ekskul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Aqidah Akhlak',
                'keterangan' => 'Pelajaran Bahasa Indonesia',
                'type' => 'Ekskul',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 1,
                'nama' => 'Pegon',
                'keterangan' => 'Pelajaran Bahasa Indonesia',
                'type' => 'Ekskul',
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
