<?php

namespace App\Http\Controllers;

use App\Models\Info_inovator;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::orderBy('id');
        $mitras = $mitras->paginate(50);

        return view('dashboard.mitra.index', compact('mitras'));
    }

    public function create()
    {
        $mitras = Info_inovator::all();
        return view('dashboard.mitra.create', compact ('mitras'));
    }

    public function store(Request $request)
    {
        $request->validate([

            "id_inovator"=> "required",
            "nama_mitra" => "required",
            "alamat_mitra" => "required",
            "peran_mitra" => "required",
            "status_kerjasama" => "required",
            
        ]);

        $info_inovators = Info_inovator::findOrFail($request->id_inovator);

        Mitra::create($request->all());

        return redirect()->route('mitra.index');


    }

    public function edit(Mitra $mitra)
    {
        $info_inovators = Info_inovator::all();
        return view('dashboard.mitra.edit', compact('info_inovators','mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            
            "id_inovator" => "required",
            "nama_mitra" => "required",
            "alamat_mitra" => "required",
            "peran_mitra" => "required",
            "status_kerjasama" => "required",
            
        ]);

        $mitra->update($request->all());

        return redirect()->route('mitra.index');
    }

    public function destroy($id)
    {
       $mitra = Mitra::findOrFail($id);

       if($mitra){
        $mitra->delete();

        return redirect()->route('mitra.index');
       }
    }
    
}
