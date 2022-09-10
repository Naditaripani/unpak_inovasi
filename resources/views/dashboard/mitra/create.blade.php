@extends('layouts.app')
@section('title', 'Tambah Informasi Mitra')

@section('title-header', 'Tambah Informasi Mitra')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mitra.index') }}">Informasi Mitra</a></li>
    <li class="breadcrumb-item active">Tambah Informasi Mitra</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Informasi Mitra</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('mitra.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_mitra">nama mitra</label>
                                    <input type="text" class="form-control @error('nama_mitra') is-invalid @enderror" id="nama_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('nama_mitra') }}" name="nama_mitra">

                                    @error('nama_mitra')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="alamat_mitra">alamat mitra</label>
                                    <input type="text" class="form-control @error('alamat_mitra') is-invalid @enderror" id="alamat_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('alamat_mitra') }}" name="alamat_mitra">

                                    @error('alamat_mitra')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="peran_mitra">Peran Mitra</label>
                                    <input type="text" class="form-control @error('peran_mitra') is-invalid @enderror" id="peran_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('peran_mitra') }}" name="peran_mitra">

                                    @error('peran_mitra')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="status_kerjasama">status kerjasama</label>
                                    <input type="text" class="form-control @error('status_kerjasama') is-invalid @enderror" id="status_kerjasama"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('status_kerjasama') }}" name="status_kerjasama">

                                    @error('status_kerjasama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="mitras">id inovator</label>
                                   
                                    
                                    <select name="id_inovator" class="form-control" id="">
                                        <option disabled selected> id </option>
                                        @foreach ($mitras as $mitra)
                                            <option value="{{ $mitra->nidn}}{{ $mitra->intitusi}}">{{ $mitra->nidn  }}{{ $mitra->intitusi}}</option>
                                        @endforeach
                                    </select>


                                    @error('mitra')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('mitra.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
