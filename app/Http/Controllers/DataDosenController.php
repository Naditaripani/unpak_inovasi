<?php

namespace App\Http\Controllers;

use App\Models\DataDosen;
use Illuminate\Http\Request;

class DataDosenController extends Controller
{
    public function index()
    {
        $datadosens = DataDosen::orderBy('id');
        $datadosens = $datadosens->paginate(50);

        return view('dashboard.datadosen.index', compact('datadosens'));
    }

     public function create()
    {
        return view('dashboard.datadosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nidn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'no_ktp' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'tgl_masuk' => 'required',
            'file_foto' => 'mimes:jpg,png,jpeg|image',
            // 'email2' => 'required',
            'sinta' => 'required',
            'matkul' => 'required'
        ]);
        
        // DataDosen::create($request->all());
        $data = DataDosen::create($request->all());
        if($request->hasFile('file_foto'))
        {
            $request->file('file_foto')->move('fotodiri/', $request->file('file_foto')->getClientOriginalName());
            $data->file_foto = $request->file('file_foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('datadosen.index')->with('success', 'Data pribadi dosen berhasil ditambahkan.');;
    }

    public function show(DataDosen $datadosen)
    {
       return view('dashboard.datadosen.show', ['datadosen' => $datadosen]);
    }

    public function edit(DataDosen $datadosen)
    {
        return view('dashboard.datadosen.edit', compact('datadosen'));
    }

    public function update(Request $request, DataDosen $datadosen)
    {
        $request->validate([
            'nip' => 'required',
            'nidn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'no_ktp' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'tgl_masuk' => 'required',
            'file_foto' => 'mimes:jpg,png,jpeg|image',
            // 'email2' => 'required',
            'sinta' => 'required',
            'matkul' => 'required'
        ]);
        
        $datadosen->update($request->all());
        if($request->file('file_foto') == "")
    	{
    		$datadosen->file_foto=$datadosen->file_foto;

    	}
    	else
    	{

    	$filename = time().'.png';
        $request->file('file_foto')->move("fotodiri/", $filename);
	   	$datadosen->file_foto = $filename;
	   }
    	$datadosen->save();

        return redirect()->route('datadosen.index')->with('success', 'Data pribadi dosen berhasil diedit.');
    }

    public function destroy($id)
    {
       $datadosen = DataDosen::findOrFail($id);

       if($datadosen){
        $datadosen->delete();

        return redirect()->route('datadosen.index')->with('success', 'Data pribadi dosen berhasil dihapus.');;
       }
       
    }
}