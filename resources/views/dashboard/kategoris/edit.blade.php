@extends('layouts.app')
@section('title', 'Ubah Kategori Pertanyaan')

@section('title-header', 'Ubah Kategori Pertanyaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('kategoris.index') }}">Kategori Pertanyaan</a></li>
    <li class="breadcrumb-item active">Ubah Kategori Pertanyaan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Kategori Pertanyaan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori"
                                        placeholder="Masukkan Nama Kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" name="nama_kategori">

                                    @error('nama_kategori')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('kategoris.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
