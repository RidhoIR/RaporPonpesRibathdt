<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Santri;
use Carbon\Carbon;

class SantrisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $santris = [
            [
                'id_classroom' => 1, // pastikan ini sesuai dengan id dari tabel classrooms
                'nomor_induk' => 'S12345',
                'nama' => 'Ahmad Zakaria',
                'nama_wali' => 'Budi Santoso',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::parse('2005-05-15'),
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'tahun_masuk' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_classroom' => 2, // pastikan ini sesuai dengan id dari tabel classrooms
                'nomor_induk' => 'S12346',
                'nama' => 'Aisyah Putri',
                'nama_wali' => 'Siti Aisyah',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => Carbon::parse('2006-03-22'),
                'alamat' => 'Jl. Raya No. 15, Bandung',
                'tahun_masuk' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the database
        foreach ($santris as $santri) {
            Santri::create($santri);
        }
    }
}
