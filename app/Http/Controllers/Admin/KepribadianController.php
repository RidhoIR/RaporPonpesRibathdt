<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\detail_kepribadian;
use App\Models\KategoriKepribadian;
use App\Models\Kepribadian;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class KepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kepribadians = Kepribadian::with('kategori')->get();
        $kategoris = KategoriKepribadian::get();
        return view('admin/Kepribadian/index', compact('kepribadians', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nilai' => 'required|string|max:1'
            ]);

            $detailKepribadian = detail_kepribadian::findOrFail($id);
            $detailKepribadian->update([
                'nilai' => $request->input('nilai')
            ]);
            return redirect()->back()->with('success', 'Nilai updated successfully');
        } catch (ModelNotFoundException $e) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Detail Kepribadian not found');
        } catch (Exception $e) {
            // Handle any other exceptions
            return redirect()->back()->with('error', 'An error occurred while updating nilai');
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
