<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\DetailMapel;
use App\Models\Mapel;
use App\Models\Rapor;
use App\Models\Santri;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapors = Rapor::with('santri.classroom')->get();
        $santris = Santri::all();
        $mapel = Mapel::all();
        return view('admin/rapor/index', compact('rapors', 'santris', 'mapel'));
    }

    // public function indexFiltered(Request $request)
    // {
    //     // Ambil nilai query parameter
    //     $semester = $request->query('semester');
    //     $classroomId = $request->query('classroom');

    //     // Filter rapor berdasarkan semester dan kelas
    //     $rapors = Rapor::where('semester', $semester)
    //         ->whereHas('santri.classroom', function ($query) use ($classroomId) {
    //             $query->where('id', $classroomId);
    //         })->with('santri.classroom')->get();

    //     // Ambil data santri dan mapel untuk kebutuhan tampilan
    //     $santris = Santri::all();
    //     $mapel = Mapel::all();

    //     // Ambil semua kelas untuk dropdown
    //     $classrooms = Classroom::all();

    //     // Kembalikan view dengan data yang difilter
    //     return view('admin/rapor/kelas/sughro', compact('rapors', 'santris', 'mapel', 'classrooms', 'semester', 'classroomId'));
    // }

    public function indexTiddal(Request $request)
    {
        // Ambil nilai semester dari query parameter
        $semester = $request->query('semester');

        // Filter rapor berdasarkan kelas 'Sughro' dan semester jika diberikan
        $rapors = Rapor::whereHas('santri.classroom', function ($query) {
            $query->where('nama', 'Tiddal');
        })->when($semester, function ($query, $semester) {
            return $query->where('semester', $semester);
        })->with('santri.classroom')->get();

        $santris = Santri::all();

        $mapel = Mapel::all();

        $classrooms = Classroom::all();

        return view('admin/rapor/kelas/tiddal', compact('rapors', 'santris', 'mapel', 'classrooms', 'semester'));
    }
    public function indexSughro(Request $request)
    {
        // Ambil nilai semester dari query parameter
        $semester = $request->query('semester');

        // Filter rapor berdasarkan kelas 'Sughro' dan semester jika diberikan
        $rapors = Rapor::whereHas('santri.classroom', function ($query) {
            $query->where('nama', 'Sughro');
        })->when($semester, function ($query, $semester) {
            return $query->where('semester', $semester);
        })->with('santri.classroom')->get();

        // Mengambil semua santri
        $santris = Santri::all();

        // Mengambil semua mapel
        $mapel = Mapel::all();

        // Mengambil semua kelas untuk dropdown semester
        $classrooms = Classroom::all();

        return view('admin/rapor/kelas/sughro', compact('rapors', 'santris', 'mapel', 'classrooms', 'semester'));
    }

    public function indexKubro(Request $request)
    {
        // Ambil nilai semester dari query parameter
        $semester = $request->query('semester');

        // Filter rapor berdasarkan kelas 'Sughro' dan semester jika diberikan
        $rapors = Rapor::whereHas('santri.classroom', function ($query) {
            $query->where('nama', 'kubro');
        })->when($semester, function ($query, $semester) {
            return $query->where('semester', $semester);
        })->with('santri.classroom')->get();

        // Mengambil semua santri
        $santris = Santri::all();

        // Mengambil semua mapel
        $mapel = Mapel::all();

        // Mengambil semua kelas untuk dropdown semester
        $classrooms = Classroom::all();
        return view('admin/rapor/kelas/kubro', compact('rapors', 'santris', 'mapel'));
    }

    public function indexWustho(Request $request)
    {
        // Ambil nilai semester dari query parameter
        $semester = $request->query('semester');

        // Filter rapor berdasarkan kelas 'Sughro' dan semester jika diberikan
        $rapors = Rapor::whereHas('santri.classroom', function ($query) {
            $query->where('nama', 'wustho');
        })->when($semester, function ($query, $semester) {
            return $query->where('semester', $semester);
        })->with('santri.classroom')->get();

        // Mengambil semua santri
        $santris = Santri::all();

        // Mengambil semua mapel
        $mapel = Mapel::all();

        // Mengambil semua kelas untuk dropdown semester
        $classrooms = Classroom::all();
        return view('admin/rapor/kelas/wustho', compact('rapors', 'santris', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rapor.create');
    }

    private function updateRanking()
    {
        // Ambil semua kombinasi unik dari tahun masuk, semester, dan kelas
        $classrooms = Classroom::all();
        $semesters = Rapor::distinct()->pluck('semester');

        foreach ($semesters as $semester) {
            foreach ($classrooms as $classroom) {
                // Ambil semua rapor untuk santri dengan kelas dan semester yang sesuai
                $rapors = Rapor::where('semester', $semester)
                    ->whereHas('santri', function ($query) use ($classroom) {
                        $query->where('id_classroom', $classroom->id);
                    })->orderBy('rata_rata_nilai', 'desc')->get();

                // Update peringkat untuk rapor-rapor tersebut
                $rank = 1;
                foreach ($rapors as $rapor) {
                    $rapor->peringkat = $rank++;
                    $rapor->save();
                }
            }
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_santri' => 'required|integer|exists:santris,id',
            'semester' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        $santri = Santri::findOrFail($validatedData['id_santri']);

        $rapor = Rapor::create([
            'id_santri' => $santri->id,
            'semester' => $validatedData['semester'],
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
        ]);

        $mapels = Mapel::where('id_classroom', $santri->id_classroom)->get();

        foreach ($mapels as $mapel) {
            DetailMapel::create([
                'id_mapel' => $mapel->id,
                'id_rapor' => $rapor->id,
                'nilai' => 0,
            ]);
        }

        // Hitung total nilai dan rata-rata nilai
        $totalNilai = $rapor->detailMapels->sum('nilai');
        $jumlahMapel = $rapor->detailMapels->count();
        $rataRataNilai = $jumlahMapel > 0 ? $totalNilai / $jumlahMapel : 0;

        // Perbarui nilai di rapor
        $rapor->update([
            'jumlah_nilai' => $totalNilai,
            'rata_rata_nilai' => $rataRataNilai,
        ]);

        // Panggil metode updateRanking jika diperlukan
        $this->updateRanking();

        return redirect()->back()->with('success', 'Rapor created successfully.');
    }

    public function updateRapor(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
        ]);

        $rapor = Rapor::findOrFail($id);
        $rapor->tahun_ajaran = $request->tahun_ajaran;
        $rapor->save();

        return redirect()->route('rapor.index')->with('success', 'Tahun ajaran berhasil diperbarui.');
    }

    public function update(Request $request, $id)
    {
        $rapor = Rapor::with('detailMapels')->findOrFail($id);

        // Loop through all updated values
        foreach ($request->nilai as $detailMapelId => $nilai) {
            $detailMapel = $rapor->detailMapels->where('id', $detailMapelId)->first();
            if ($detailMapel) {
                $detailMapel->nilai = $nilai;

                // Check if 'keterangan' exists in the request, and update it if necessary
                if (isset($request->keterangan[$detailMapelId])) {
                    $detailMapel->keterangan = $request->keterangan[$detailMapelId];
                }

                $detailMapel->save();
            }
        }

        // Calculate total and average scores from non-zero values
        $totalNilai = $rapor->detailMapels->where('nilai', '>', 0)->sum('nilai');
        $jumlahMapel = $rapor->detailMapels->where('nilai', '>', 0)->count();

        // Calculate the average score, ignoring subjects with a score of 0
        $rataRataNilai = $jumlahMapel > 0 ? $totalNilai / $jumlahMapel : 0;
        $rataRataNilai = number_format($rataRataNilai, 2);

        // Save total and average scores to the Rapor table
        $rapor->jumlah_nilai = $totalNilai;
        $rapor->rata_rata_nilai = $rataRataNilai;
        $rapor->save();

        $this->updateRanking();

        return redirect()->route('rapor.show', $id)->with('success', 'Nilai updated successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rapor = Rapor::with('santri', 'detailMapels.mapel', 'detail_kepribadians.kepribadian')->where('id', $id)->firstOrFail();
        return view('admin.rapor.show', compact('rapor'));
    }

    public function downloadPDF($id)
    {
        $rapor = Rapor::with('santri', 'detailMapels.mapel', 'detail_kepribadians.kepribadian')->where('id', $id)->firstOrFail();

        $matapelajaran = $rapor->detailMapelsMatapelajaran;
        $ekskul = $rapor->detailMapelsEkstrakurikuler;
        $kepriadian = $rapor->detail_kepribadians;
        $tanggalSekarang = Carbon::now()->locale('id')->isoFormat('D MMMM YYYY');

        $logoPath = public_path('assets/images/logoponpes.png');

        $pdf = PDF::loadView('admin.rapor.pdf', compact('rapor', 'matapelajaran', 'ekskul', 'logoPath', 'kepriadian', 'tanggalSekarang'));
        return $pdf->download('laporan_rapor_' . $rapor->santri->nama . '.pdf');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
}
