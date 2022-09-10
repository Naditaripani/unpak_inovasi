<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::orderBy('id');
        $pertanyaans = $pertanyaans->paginate(50);
        return view('dashboard.pertanyaans.index', compact('pertanyaans'));
    }

    public function create()
    {
         $pertanyaans = Kategori::all();
        return view('dashboard.pertanyaans.create', compact('pertanyaans'));
        // return view('dashboard.pertanyaans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "kategori_id" => "required",
            "isi_pertanyaan" => "required",
        ]);

        $kategori = Kategori::findOrFail($request->kategori_id);

        Pertanyaan::create($request->all());

        return redirect()->route('pertanyaans.index');
    }

    public function edit(pertanyaan $pertanyaan)
    {
        $kategories = Kategori::all();
        return view('dashboard.pertanyaans.edit', compact('kategories','pertanyaan'));
    }

    public function update(Request $request, pertanyaan $pertanyaan)
    {
        $request->validate([
            "kategori_id" => "required",
            "isi_pertanyaan" => "required",
        ]);

        $pertanyaan->update($request->all());
        // return redirect(route('users.index'))
        return redirect()->route('pertanyaans.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
       $pertanyaan = Pertanyaan::findOrFail($id);

       if($pertanyaan){
        $pertanyaan->delete();

        return redirect()->route('pertanyaans.index')->with('success', 'Data berhasil dihapus.');
       }
    }
}
