<?php

namespace App\Http\Controllers;

use App\Models\Info_inovator;
use App\Models\Anggota_tim;
use Illuminate\Http\Request;

class Anggota_timController extends Controller
{
    public function index()
    {
        $anggota_tims = Anggota_tim::orderBy('id');
        $anggota_tims = $anggota_tims->paginate(50);

        return view('dashboard.anggota_tim.index', compact('anggota_tims'));
    }

    public function create()
    {
        $anggota_tims = Info_inovator::all();
        return view('dashboard.anggota_tim.create', compact ('anggota_tims'));
    }

    public function store(Request $request)
    {
        $request->validate([

            "id_inovator" => "required",
            "nidn" => "required",
            "keahlian" => "required",
            
        ]);

        $info_inovators = Info_inovator::findOrFail($request->id_inovator);

        Anggota_tim::create($request->all());

        return redirect()->route('anggota_tim.index');


    }

    public function edit(Anggota_tim $anggota_tim)
    {
        $info_inovators = Info_inovator::all();
        return view('dashboard.anggota_tim.edit', compact('info_inovators','anggota_tim'));
    }

    public function update(Request $request, Anggota_tim $anggota_tim)
    {
        $request->validate([
            
            "id_inovator" => "required",
            "nidn" => "required",
            "keahlian" => "required",
            
            
        ]);

        $anggota_tim->update($request->all());

        return redirect()->route('anggota_tim.index');
    }

    public function destroy($id)
    {
       $anggota_tim = Anggota_tim::findOrFail($id);

       if($anggota_tim){
        $anggota_tim->delete();

        return redirect()->route('anggota_tim.index');
       }
    }
    
}
