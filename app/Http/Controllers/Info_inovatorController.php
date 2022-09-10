<?php

namespace App\Http\Controllers;


use App\Models\Info_inovator;
use Illuminate\Http\Request;

class Info_inovatorController extends Controller
{
    public function index()
    {
        $info_inovators = Info_inovator::orderBy('id');
        $info_inovators = $info_inovators->paginate(50);

        return view('dashboard.info_inovator.index', compact('info_inovators'));
    }

    public function create()
    {
        return view('dashboard.info_inovator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nidn" => "required",
            "institusi" => "required",
            "alamat_kontak" => "required",
            "phone" => "required",
            "fax" => "required",
        ]);

        Info_inovator::create($request->all());

        return redirect()->route('info_inovator.index');
    }

    public function edit(Info_inovator $info_inovator)
    {
        return view('dashboard.Info_inovator.edit', compact('info_inovator'));
    }

    public function update(Request $request, Info_inovator $info_inovator)
    {
        $request->validate([
            "nidn" => "required",
            "institusi" => "required",
            "alamat_kontak" => "required",
            "phone" => "required",
            "fax" => "required",
        ]);

        $info_inovator->update($request->all());

        return redirect()->route('info_inovator.index');
    }

    public function destroy($id)
    {
       $info_inovator = Info_inovator::findOrFail($id);

       if($info_inovator){
        $info_inovator->delete();

        return redirect()->route('info_inovator.index');
       }
    }
    

}

