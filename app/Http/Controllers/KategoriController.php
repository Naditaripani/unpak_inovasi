<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::orderBy('id');
        $kategoris = $kategoris->paginate(50);

        return view('dashboard.kategoris.index', compact('kategoris'));
    }

     public function create()
    {
        return view('dashboard.kategoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_kategori" => "required",
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategoris.index');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategoris.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            "nama_kategori" => "required",
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategoris.index');
    }

    public function destroy($id)
    {
       $kategori = Kategori::findOrFail($id);

       if($kategori){
        $kategori->delete();

        return redirect()->route('kategoris.index');
       }
    }
}
