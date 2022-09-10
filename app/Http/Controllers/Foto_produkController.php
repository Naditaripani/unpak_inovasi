<?php

namespace App\Http\Controllers;

use App\Models\DataDosen;
use App\Models\Foto_produk;
use Illuminate\Http\Request;

class Foto_produkController extends Controller
{
    public function index()
    {
        $foto_produks = DataDosen::orderBy('id');
        $foto_produks = $foto_produks->paginate(50);

        return view('dashboard.foto_produk.index', compact('foto_produks'));
    }

    public function create()
    {
        $foto_produks = DataDosen::all();
        return view('dashboard.foto_produk.create', compact ('foto_produks'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input = $request->validate([

            
            "foto" => "required",
        ]);
        $input['id_pribadi'] = auth()->user()->id;
         dd($input);

       

        $data = Foto_produk::create($request->$input());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoproduk/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('foto_produk.index');


    }

    public function edit(Foto_produk $foto_produk)
    {
        $datadosens = DataDosen::all();
        return view('dashboard.foto_produk.edit', compact('datadosens','foto_produk'));
    }

    public function update(Request $request, Foto_produk $foto_produk)
    {
        $request->validate([
            
            "id_pribadi" => "required",
            "foto" => "required",
        ]);

        $foto_produk->update($request->all());

        if($request->file('foto') == "")
    	{
    		$foto_produk->foto=$foto_produk->foto;

    	}
    	else
    	{

    	$filename = time().'.png';
        $request->file('foto')->move("fotoproduk/", $filename);
	   	$foto_produk->foto = $filename;
	   }
    	$foto_produk->save();

        return redirect()->route('foto_produk.index');
    }

    public function destroy($id)
    {
       $foto_produk = Foto_produk::findOrFail($id);

       if($foto_produk){
        $foto_produk->delete();

        return redirect()->route('foto_produk.index');
       }
    }
    
}
