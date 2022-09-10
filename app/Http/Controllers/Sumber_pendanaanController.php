<?php

namespace App\Http\Controllers;

use App\Models\Info_inovator;
use App\Models\Sumber_pendanaan;
use Illuminate\Http\Request;

class Sumber_pendanaanController extends Controller
{
    public function index()
    {
        $sumber_pendanaans = Sumber_pendanaan::orderBy('id');
        $sumber_pendanaans = $sumber_pendanaans->paginate(50);

        return view('dashboard.sumber_pendanaan.index', compact('sumber_pendanaans'));
    }

    public function create()
    {
        $sumber_pendanaans = Info_inovator::all();
        return view('dashboard.sumber_pendanaan.create', compact ('sumber_pendanaans'));
    }

    public function store(Request $request)
    {
        $request->validate([

            "id_inovator" => "required",
            "tahun_dana" => "required",
            "total_dana" => "required",
            "sumber_dana" => "required",
           
            
        ]);

        $info_inovators = Info_inovator::findOrFail($request->id_inovator);

        Sumber_pendanaan::create($request->all());

        return redirect()->route('sumber_pendanaan.index');


    }

    public function edit(Sumber_pendanaan $sumber_pendanaan)
    {
        $info_inovators = Info_inovator::all();
        return view('dashboard.sumber_pendanaan.edit', compact('info_inovators','sumber_pendanaan'));
    }

    public function update(Request $request, Sumber_pendanaan $sumber_pendanaan)
    {
        $request->validate([
            
            "id_inovator" => "required",
            "tahun_dana" => "required",
            "total_dana" => "required",
            "sumber_dana" => "required",
            
            
            
        ]);

        $sumber_pendanaan->update($request->all());

        return redirect()->route('sumber_pendanaan.index');
    }

    public function destroy($id)
    {
       $sumber_pendanaan = Sumber_pendanaan::findOrFail($id);

       if($sumber_pendanaan){
        $sumber_pendanaan->delete();

        return redirect()->route('sumber_pendanaan.index');
       }
    }
    
}
