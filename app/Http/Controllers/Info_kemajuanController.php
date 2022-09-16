<?php

namespace App\Http\Controllers;

use App\Models\DataDosen;
use App\Models\Info_kemajuan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class Info_kemajuanController extends Controller
{
    public function index()
    {
        $info_kemajuans = Info_kemajuan::orderBy('id');
        $info_kemajuans = $info_kemajuans->paginate(50);
        return view('dashboard.info_kemajuan.index', compact('info_kemajuans'));
    }

    public function create()
    {
         $info_kemajuans = Info_kemajuan::all();
         $pertanyaans = Pertanyaan::all();
        return view('dashboard.info_kemajuan.create', compact('info_kemajuans','pertanyaans'));
        // return view('dashboard.pertanyaans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "id_pribadi" => "required",
            "id_pertanyaan" => "required",
            "jawaban" => "required",
            "keterangan" => "required",
        ]);

        $datadosens = DataDosen::findOrFail($request->id_pribadi);
        $pertanyaans = Pertanyaan::findOrFail($request->id_pertanyaan);

        Info_kemajuan::create($request->all());

        return redirect()->route('info_kemajuans.index');
    }

    public function edit(Info_kemajuan $info_kemajuan)
    {
        $datadosens = DataDosen::all();
        $pertanyaans = Pertanyaan::all();
        return view('dashboard.info_kemajuan.edit', compact('datadosen','pertanyaan','info_kemajuan'));
    }

    public function update(Request $request, Info_kemajuan $info_kemajuan)
    {
        $request->validate([
            "id_pribadi" => "required",
            "id_pertanyaan" => "required",
            "jawaban" => "required",
            "keterangan" => "required",
        ]);

        $info_kemajuan->update($request->all());
        // return redirect(route('users.index'))
        return redirect()->route('info_kemajuans.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
       $info_kemajuan = Info_kemajuan::findOrFail($id);

       if($info_kemajuan){
        $info_kemajuan->delete();

        return redirect()->route('info_kemajuans.index')->with('success', 'Data berhasil dihapus.');
       }
    }
}
