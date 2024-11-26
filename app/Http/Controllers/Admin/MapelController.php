<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\DetailMapel;
use App\Models\Mapel;
use App\Models\Rapor;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::with('classroom')->get();
        $classrooms = Classroom::get();
        return view('admin/mapel/index', compact('mapels', 'classrooms'));
    }

    public function indexTiddal(){
        $classroom = Classroom::where('nama', 'tiddal')->firstOrFail();
        $mapels = Mapel::where('id_classroom', $classroom->id)->get();
        $classrooms = Classroom::get();

        return view('admin/mapel/kelas/tiddal', compact('mapels', 'classroom','classrooms'));

    }

    public function indexSughro()
    {
        $classroom = Classroom::where('nama', 'sughro')->firstOrFail();
        $mapels = Mapel::where('id_classroom', $classroom->id)->get();
        $classrooms = Classroom::get();

        return view('admin/mapel/kelas/sughro', compact('mapels', 'classroom','classrooms'));
    }

    public function indexKubro()
    {
        $classroom = Classroom::where('nama', 'Kubro')->firstOrFail();
        $mapels = Mapel::where('id_classroom', $classroom->id)->get();
        $classrooms = Classroom::get();


        return view('admin/mapel/kelas/kubro', compact('mapels', 'classroom','classrooms'));
    }

    public function indexWustho()
    {
        $classroom = Classroom::where('nama', 'Wustho')->firstOrFail();
        $mapels = Mapel::where('id_classroom', $classroom->id)->get();
        $classrooms = Classroom::get();


        return view('admin/mapel/kelas/wustho', compact('mapels', 'classroom','classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            // 'keterangan' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'id_classroom' => 'required|integer|exists:classrooms,id',
        ]);

        $mapel = Mapel::create($request->all());

        $rapors = Rapor::whereHas('santri', function ($query) use ($mapel) {
            $query->where('id_classroom', $mapel->id_classroom);
        })->get();

        foreach ($rapors as $rapor) {
            DetailMapel::create([
                'id_mapel' => $mapel->id,
                'id_rapor' => $rapor->id,
                'nilai' => 0,
            ]);
        }

        return redirect()->back()->with('success', 'Mapel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'type' => 'required|string',
            'id_classroom' => 'required|integer|exists:classrooms,id',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($validatedData);

        return redirect()->route('mapel.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $detailMapel = DetailMapel::where('id_mapel', $id)->exists();
        // if ($detailMapel) {
        //     return redirect()->route('mapel.index')->with('error', 'Data mapel gagal dihapus');
        // }
        // $mapel = Mapel::findOrFail($id);
        // $mapel->delete();
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
