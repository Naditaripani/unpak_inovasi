<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateDosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::orderByDesc('id');
        $dosens = $dosens->paginate(50);

        return view('dashboard.dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateDosen $request)
    {
        $validated = $request->validated() + [
            'created_at' => now(),
        ];

        $dosen = Dosen::create($validated);

        User::create([
            'username' => $dosen->nidn,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('dosens.index'))->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosens =  Dosen::whereId($id)->paginate(1);
        $isDetail = true;
        return view('dashboard.dosens.index', compact('dosens', 'isDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dashboard.dosens.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateDosen $request, $id)
    {
        $validated = $request->validated() + [
            'nama_dosen' => $request->nama,
            'updated_at' => now(),
        ];

        $dosens = Dosen::findOrFail($id);
        $dosens->update($validated);

        $dosens->user->update([
            'username' => $dosens->nidn,
            'updated_at' => now()
        ]);

        return redirect(route('users.index'))->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosens = Dosen::findOrFail($id);
        $user = User::where('username', $dosens->nidn)->orWhere('username', $dosens->kode_prodi)->firstOrFail();
        
        $dosens->delete();
        $user->delete();

        return redirect(route('dosens.index'))->with('success', 'Data dosen berhasil dihapus.');
    }
}
