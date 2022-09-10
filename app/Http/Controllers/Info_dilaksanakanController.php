<?php

namespace App\Http\Controllers;

use App\Models\Info_inovator;
use App\Models\Info_dilaksanakan;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Info_dilaksanakanController extends Controller
{
    public function index()
    {
        // $info_dilaksanakans = Info_dilaksanakan::orderBy('id');
        $info_dilaksanakans = Info_dilaksanakan::where("id_pribadi", Auth::user()->nidn)->orderBy('id');
        $info_dilaksanakans = $info_dilaksanakans->paginate(50);

        return view('dashboard.info_dilaksanakan.index', compact('info_dilaksanakans'));
    }

    public function create()
    {
        $info_dilaksanakans = Info_inovator::all();
        $dosen = Dosen::where("user_id", Auth::user()->id);
     
        return view('dashboard.info_dilaksanakan.create', compact ('info_dilaksanakans','dosen'));
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([

            
            "id_pribadi" => "required",
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
         

        $info_inovators = Info_inovator::findOrFail($request->id_inovator);
      

        $data = Info_dilaksanakan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoproduk/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('info_dilaksanakan.index')->with('success', 'Data berhasil ditambahkan.');


    }

    public function show(Info_dilaksanakan $info_dilaksanakan)
    {
       return view('dashboard.info_dilaksanakan.show', ['info_dilaksanakan' => $info_dilaksanakan]);
    }

    public function edit(Info_dilaksanakan $info_dilaksanakan)
    {
        $info_inovators = Info_inovator::all();
     
        return view('dashboard.info_dilaksanakan.edit', compact( 'info_inovators','info_dilaksanakan'));
    }

    public function update(Request $request, Info_dilaksanakan $info_dilaksanakan)
    {
        $request->validate([
            
            "id_pribadi" => "required",
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
