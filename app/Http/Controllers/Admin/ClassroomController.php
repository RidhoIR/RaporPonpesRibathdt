<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Santri;
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
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        Classroom::create($request->all());
        return redirect()->route('classroom.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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

        $request->validate([
            'nama' => 'required',
            'tahun_ajaran' => 'required',
        ]);
        try {
            // dd($request->all());
            $classroom = Classroom::find($id);
            $classroom->update($request->all());
            return redirect()->route('classroom.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('classroom.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $santri = Santri::where('id_classroom', $id)->exists();
        if ($santri) {
            return redirect()->route('classroom.index')->with('error', 'Data santri gagal dihapus');
        }
        $classroom = Classroom::find($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success', 'Data berhasil dihapus');
    }
}
