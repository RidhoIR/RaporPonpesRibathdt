<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\DetailMapel;
use App\Models\Mapel;
use App\Models\Rapor;
use App\Models\Santri;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SantriController extends Controller
{

    public function index()
    {
        $santris = Santri::with('classroom')->get();
        $classrooms = Classroom::get();

        return view('admin/santri/index', compact('santris', 'classrooms'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('admin.santri.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        try {
            $santri = Santri::create([
                'id_classroom' => $request->id_classroom,
                'nomor_induk' => $request->nomor_induk,
                'nama' => $request->nama,
                'nama_wali' => $request->nama_wali,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'tahun_masuk' => $request->tahun_masuk,
            ]);
        
            
            $mapels = Mapel::where('id_classroom', $request->id_classroom)->get();
            $tahunAjaran = Carbon::now()->format('Y') . '-' . (Carbon::now()->format('Y') + 1);
            
            $rapor = Rapor::create([
                'id_santri' => $santri->id,
                'semester' => 1,
                'tahun_ajaran' => $tahunAjaran,
            ]);
            
            foreach ($mapels as $mapel) {
                DetailMapel::create([
                    'id_mapel' => $mapel->id,
                    'id_rapor' => $rapor->id, 
                    'nilai' => 0,
                ]);
            }

            return redirect()->route('santri.index')
                ->with('success', 'Santri created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function show($id)
    {
        $santri = Santri::findOrFail($id);
        return view('admin.santri.show', compact('santri'));
    }


    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        $classrooms = Classroom::all();
        return view('admin.santri.edit', compact('santri', 'classrooms'));
    }


    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nomor_induk' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'id_classroom' => 'required|integer|exists:classrooms,id',
                'nama_wali' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'tahun_masuk' => 'required|integer',
            ]);
    
            $santri = Santri::findOrFail($id);
            $previousClassroomId = $santri->id_classroom;
    
            $santri->update($validatedData);
    
            if ($previousClassroomId != $validatedData['id_classroom']) {
                
                $rapors = Rapor::where('id_santri', $santri->id)->get();
    
                foreach ($rapors as $rapor) {
                    
                    DetailMapel::where('id_rapor', $rapor->id)->delete();
    
                    
                    $newMapels = Mapel::where('id_classroom', $validatedData['id_classroom'])->get();
    
                    foreach ($newMapels as $mapel) {
                        DetailMapel::create([
                            'id_mapel' => $mapel->id,
                            'id_rapor' => $rapor->id,
                            'nilai' => 0,
                        ]);
                    }
    
                    $totalNilai = $rapor->detailMapels->sum('nilai');
                    $jumlahMapel = $rapor->detailMapels->count();
                    $rataRataNilai = $jumlahMapel > 0 ? $totalNilai / $jumlahMapel : 0;
    
                    $rapor->update([
                        'jumlah_nilai' => $totalNilai,
                        'rata_rata_nilai' => $rataRataNilai,
                    ]);
                }
            }    

            return redirect()->route('santri.index')->with('success', 'Data santri berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function destroy($id)
    {
        $rapor = Rapor::where('id_santri', $id)->exists();
        if ($rapor) {
            return redirect()->route('santri.index')->with('error', 'Data santri gagal dihapus');
        }
        $santri = Santri::findOrFail($id);
        $santri->delete();
        return redirect()->route('santri.index')->with('success', 'Data santri berhasil dihapus');
    }
}
