<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('admin/kelas/index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/kelas/tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tahun_ajaran_masehi' => 'required',
            'tahun_ajaran_hijriah' => 'required',
        ]);

        Classroom::create($request->all());
        return redirect()->route('classroom.index')->with('success', 'Data berhasil ditambahkan');
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
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama' => 'required',
            'tahun_ajaran_masehi' => 'required',
            'tahun_ajaran_hijriah' => 'required',
        ]);

        $classroom = Classroom::find($id);
        $classroom->update($request->all());
        return redirect()->route('classroom.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success', 'Data berhasil dihapus');
    }
}
