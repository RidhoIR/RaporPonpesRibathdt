<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Mapel;
use App\Models\Rapor;
use App\Models\Santri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSantri = Santri::count();
        $totalKelas = Classroom::count();
        $totalMapel = Mapel::count();
        $totalRapor = Rapor::count();

        // Menyiapkan data rata-rata nilai per semester
        $kelasRataRata = Classroom::with(['santris.rapors'])->get()->map(function ($classroom) {
            // Mengelompokkan rata-rata nilai berdasarkan semester
            $rataRataPerSemester = $classroom->santris->flatMap->rapors->groupBy('semester')->map(function ($rapors) {
                $rataNilai = $rapors->sum('rata_rata_nilai');
                $jumlahRapor = $rapors->count();
                return $jumlahRapor > 0 ? round($rataNilai / $jumlahRapor, 2) : 0;
            });
            return [
                'nama' => $classroom->nama,
                'rataRataPerSemester' => $rataRataPerSemester
            ];
        });

        $kelasJumlahNilai = Classroom::with(['santris.rapors'])->get()->map(function ($classroom) {
            // Mengelompokkan rata-rata nilai berdasarkan semester
            $jummlahPerSemester = $classroom->santris->flatMap->rapors->groupBy('semester')->map(function ($rapors) {
                $jumlahNilai = $rapors->sum('jumlah_nilai');
                $jumlahRapor = $rapors->count();
                return $jumlahRapor > 0 ? round($jumlahNilai / $jumlahRapor, 2) : 0;
            });
            return [
                'nama' => $classroom->nama,
                'jumlahPerSemester' => $jummlahPerSemester
            ];
        });
        return view('admin/dashboard', compact('totalSantri', 'totalKelas', 'totalMapel', 'totalRapor', 'kelasRataRata','kelasJumlahNilai'));
    }
}
