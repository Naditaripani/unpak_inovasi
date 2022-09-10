<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        $masters = Master::orderBy('id');
        $masters = $masters->paginate(50);

        return view('dashboard.master.index', compact('masters'));
    }

     public function create()
    {
        return view('dashboard.master.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "kategori_master" => "required",
            "isi_master" => "required",
        ]);

        Master::create($request->all());

        return redirect()->route('master.index');
    }

    public function edit(Master $master)
    {
        return view('dashboard.master.edit', compact('master'));
    }

    public function update(Request $request, Master $master)
    {
        $request->validate([
            "kategori_master" => "required",
            "isi_master" => "required",
        ]);

        $master->update($request->all());

        return redirect()->route('master.index');
    }

    public function destroy($id)
    {
       $master = Master::findOrFail($id);

       if($master){
        $master->delete();

        return redirect()->route('master.index');
       }
    }
}
