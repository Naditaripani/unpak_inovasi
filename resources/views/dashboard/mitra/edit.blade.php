@extends('layouts.app')
@section('title', 'Ubah Data Mitra')

@section('title-header', 'Ubah Data Mitra')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('mitra.index') }}">Data Mitra</a></li>
    <li class="breadcrumb-item active">Ubah Data Mitra</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Mitra</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_mitra">nama_mitra</label>
                                    <input type="" class="form-control @error('nama_mitra') is-invalid @enderror" id="nama_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('nama_mitra', $mitra->nama_mitra) }}" name="nama_mitra">

                                    @error('nama_mitra')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="alamat_mitra">Alamat Mitra</label>
                                    <input type="" class="form-control @error('alamat_mitra') is-invalid @enderror" id="alamat_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('alamat_mitra', $mitra->alamat_mitra) }}" name="alamat_mitra">

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
                                    <input type="" class="form-control @error('peran_mitra') is-invalid @enderror" id="peran_mitra"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('peran_mitra', $mitra->peran_mitra) }}" name="peran_mitra">

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
                                    <input type="" class="form-control @error('status_kerjasama') is-invalid @enderror" id="status_kerjasama"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('status_kerjasama', $mitra->status_kerjasama) }}" name="status_kerjasama">

                                    @error('status_kerjasama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="mitras">info_inovator mitra</label>
                                    
                                    <select class="form-control @error('info_inovator') is-invalid @enderror" id="mitra" name="id_inovator">
                                       
                                        @foreach ($info_inovators as $info_inovator)
                                            <option value="{{ $info_inovator->id }}" @if ($mitra->info_inovator->id == $info_inovator->id) selected @endif>
                                                {{ $info_inovator->id }}</option>
                                        @endforeach
                                    </select>
                                    

                                    @error('info_inovator')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('mitra.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection