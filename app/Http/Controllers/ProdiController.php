<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateDosen;
use App\Http\Requests\RequestStoreOrUpdateProdi;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodis = Prodi::orderByDesc('id');
        $prodis = $prodis->paginate(50);

        return view('dashboard.prodis.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.prodis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateProdi $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $prodis = Prodi::create($validated);

        User::create([
            'username' => $prodis->kode_prodi,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('prodis.index'))->with('success', 'Data prodi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodis =  Prodi::whereId($id)->paginate(1);
        $isDetail = true;
        return view('dashboard.prodis.index', compact('prodis', 'isDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);

        return view('dashboard.prodis.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateProdi $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $prodis = Prodi::findOrFail($id);
        $prodis->update($validated);

        $prodis->user->update([
            'username' => $prodis->kode_prodi,
            'updated_at' => now()
        ]);

        return redirect(route('users.index'))->with('success', 'Data prodi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodis = Prodi::findOrFail($id);
        $user = User::where('username', $prodis->kode_prodi)->firstOrFail();

        $prodis->delete();
        $user->delete();

        return redirect(route('prodis.index'))->with('success', 'Data prodi berhasil dihapus.');
    }
}
