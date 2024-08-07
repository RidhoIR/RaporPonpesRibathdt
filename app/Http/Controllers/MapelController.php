<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapels = Mapel::all();
        return view('admin/mapel/index', compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/mapel/tambah');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'ekstrakulikuler' => 'boolean',
        ]);

        $mapel = new Mapel();
        $mapel->nama = $request->nama;
        $mapel->keterangan = $request->keterangan;
        $mapel->ekstrakulikuler = $request->has('ekstrakulikuler');
        $mapel->save();

        return redirect()->route('mapel.index')
            ->with('success', 'Mata Pelajaran Berhasil Dibuat.');
    }

    public function show(Mapel $mapel)
    {
        return view('admin/mapel/show', compact('mapels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->nama = $request->nama;
        $mapel->keterangan = $request->keterangan;
        $mapel->ekstrakulikuler = $request->input('ekstrakulikuler');
        $mapel->save();

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')
            ->with('success', 'Mata pelajaran Berhasil Dihapus.');
    }
}
