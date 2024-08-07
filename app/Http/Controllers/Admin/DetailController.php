<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\DetailMapel;
use App\Models\Mapel;
use App\Models\Santri;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::all();
        $mapel = Mapel::all();
        return view('admin/rapor/index',compact('santris','mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $santris = Santri::all();
        $mapel = Mapel::all();
        return view('detail-rapor.create',compact('santris','mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_mapel' => 'required|array',
            'id_santri' => 'required|array',

        ]);

        // Mengambil data yang dipilih
        $mapelId = $request->input('id_mapel');

        // Contoh pemrosesan data
        foreach ($mapelId as $mapel) {
            // Lakukan sesuatu dengan setiap ID kelas yang dipilih
            // Misalnya, simpan ke database atau proses lainnya
        }

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('detail-rapor.index')->with('success', 'Data berhasil disimpan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
