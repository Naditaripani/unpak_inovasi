@extends('layouts.app')
@section('title', 'Tambah Data Kategori Pertanyaan')

@section('title-header', 'Tambah Data Kategori Pertanyaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('kategoris.index') }}">Data Kategori</a></li>
    <li class="breadcrumb-item active">Tambah Data Kategori Pertanyaan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Kategori Pertanyaan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategoris.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori"
                                        placeholder="Masukkan Nama Kategori Pertanyaan" value="{{ old('nama_kategori') }}" name="nama_kategori">

                                    @error('nama_kategori')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('kategoris.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
