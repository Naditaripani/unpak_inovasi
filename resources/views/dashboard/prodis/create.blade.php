@extends('layouts.app')
@section('title', 'Tambah Data Prodi')

@section('title-header', 'Tambah Data Prodi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('prodis.index') }}">Data Prodi</a></li>
    <li class="breadcrumb-item active">Tambah Data Prodi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Prodi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('prodis.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kode_prodi">Kode Prodi</label>
                                    <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('kode_prodi') }}" name="kode_prodi">

                                    @error('kode_prodi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="password">Katasandi</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Katasandi Dosens" name="password">

                                    @error('password')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="confirmation_password">Konfirmasi katasandi</label>
                                    <input type="password" class="form-control @error('confirmation_password') is-invalid @enderror"
                                        id="confirmation_password" placeholder="Konfirmasi katasandi Dosens"
                                        name="confirmation_password">

                                    @error('confirmation_password')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('prodis.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
