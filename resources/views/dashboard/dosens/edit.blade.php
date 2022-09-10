@extends('layouts.app')
@section('title', 'Ubah Data Dosen')

@section('title-header', 'Ubah Data Dosen')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Pengguna</a></li>
    <li class="breadcrumb-item active">Ubah Data Dosen</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Dosen</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama lengkap..." value="{{ old('nama', $dosen->nama_dosen) }}" name="nama" required>

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan NIDN" value="{{ old('nidn', $dosen->nidn) }}" name="nidn">

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kode_prodi">Kode Prodi</label>
                                    <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('kode_prodi', $dosen->kode_prodi) }}" name="kode_prodi">

                                    @error('kode_prodi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
