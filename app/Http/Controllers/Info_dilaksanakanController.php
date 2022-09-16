<?php

namespace App\Http\Controllers;

// use App\Models\Kategori;

use App\Models\Info_dilaksanakan;
use Illuminate\Http\Request;

class Info_dilaksanakanController extends Controller
{
    public function index()
    {
        $info_dilaksanakans = Info_dilaksanakan::orderBy('id');
        $info_dilaksanakans = $info_dilaksanakans->paginate(50);

        return view('dashboard.info_dilaksanakan.index', compact('info_dilaksanakans'));
    }

     public function create()
    {
        return view('dashboard.info_dilaksanakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "judul_inovator" => "required",
            "sub_judul" => "required",
            "nama_program" => "required",
            "jenis" => "required",
            "bidang" => "required",
            "manfaat" => "required",
            "lama_program" => "required",
            "berjalan_tahun_sedang" => "required",
            "ringkasan_inovasi" => "required",
            "kebaruan" => "required",
            "keunggulan" => "required",
        ]);

        Info_dilaksanakan::create($request->all());

        return redirect()->route('info_dilaksanakan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Info_dilaksanakan $info_dilaksanakan)
    {
       return view('dashboard.info_dilaksanakan.show', ['info_dilaksanakan' => $info_dilaksanakan]);
    }

    public function edit(Info_dilaksanakan $info_dilaksanakan)
    {
        return view('dashboard.info_dilaksanakan.edit', compact('info_dilaksanakan'));
    }

    public function update(Request $request, Info_dilaksanakan $info_dilaksanakan)
    {
        $request->validate([
            "judul_inovator" => "required",
            "sub_judul" => "required",
            "nama_program" => "required",
            "jenis" => "required",
            "bidang" => "required",
            "manfaat" => "required",
            "lama_program" => "required",
            "berjalan_tahun_sedang" => "required",
            "ringkasan_inovasi" => "required",
            "kebaruan" => "required",
            "keunggulan" => "required",
        ]);

        $info_dilaksanakan->update($request->all());

        return redirect()->route('info_dilaksanakan.index')->with('success', 'Data berhasil diedit.');
    }

    public function destroy($id)
    {
       $info_dilaksanakan = Info_dilaksanakan::findOrFail($id);

       if($info_dilaksanakan){
        $info_dilaksanakan->delete();

        return redirect()->route('info_dilaksanakan.index')->with('success', 'Data berhasil dihapus.');
       }
    }
}
