<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdateUser;
use App\Models\DataDosen;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['roles:admin'])->except(['index', 'show', 'userDataTable']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderByDesc('id');
        $users = $users->paginate(50);
        $isDetail = false;
        return view('dashboard.users.index', compact('users', 'isDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $users = DataDosen::all();
        return view('dashboard.users.create', compact('users'));
        // return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdateUser $request)
    {
        $validated = $request->all() + [
            'created_at' => now(),
        ];

        $validated['password'] = Hash::make($validated['password']);
        $datadosens = DataDosen::findOrFail($request->nidn);

        $user = User::create($validated);

        if($user->role == 'dosen'){
            $user->dosens()->create([
                'user_id' => $user->id,
                'nama_dosen' => $request->nama,
                'nidn' => $request->nidn,
                'kode_prodi' => $user->username,
                'created_at' => now()
            ]);
        } else {
            $user->prodis()->create([
                'user_id' => $user->id,
                'nama_prodi' => $request->nama,
                'kode_prodi' => $user->username,
                'created_at' => now()
            ]);
        }
        
        return redirect(route('users.index'))->with('success', 'Data Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::whereId($id)->paginate(1);
        $isDetail = true;
        return view('dashboard.users.index', compact('users', 'isDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateUser $request, $id)
    {
        $validated = $request->all() + [
            'updated_at' => now(),
        ];

        $user = User::findOrFail($id);

        $user->update($validated);

        return redirect(route('users.index'))->with('success', 'Data Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('users.index'))->with('success', 'Data Pengguna berhasil dihapus.');
    }
}