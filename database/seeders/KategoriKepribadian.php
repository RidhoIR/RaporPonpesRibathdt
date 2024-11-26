<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKepribadian extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_kepribadians')->insert([
            ['indikator_kepribadian' => 'Sikap Terhadap Guru dan Pembina Asrama'],
            ['indikator_kepribadian' => 'Sikap Terhadap Teman'],
            ['indikator_kepribadian' => 'Sikap Belajar di Kamar'],
            ['indikator_kepribadian' => 'Sikap Ketika di Masjid/Musholla'],
            ['indikator_kepribadian' => 'Sikap Ketika Makan dan Minum'],
            ['indikator_kepribadian' => 'Sikap terhadap Lingkungan'],
            ['indikator_kepribadian' => 'Sikap Ketika Halaqoh Al-Quran'],
            ['indikator_kepribadian' => 'Kerapian, Ketertiban dan Kebersihan Diri'],

        ]);
    }
}
