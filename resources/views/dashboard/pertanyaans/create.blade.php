@extends('layouts.app')
@section('title', 'Tambah Data Pertanyaan')

@section('title-header', 'Tambah Data Pertanyaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pertanyaans.index') }}">Data Pertanyaan</a></li>
    <li class="breadcrumb-item active">Tambah Data Pertanyaan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Pertanyaan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pertanyaans.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="pertanyaans">Kategori Pertanyaan</label>
                                    {{-- <select type="number" class="form-control @error('kategori_pertanyaan') is-invalid @enderror" id="kategori_pertanyaan"
                                        placeholder="Masukkan Kategori Pertanyaan" value="{{ old('kategori_pertanyaan') }}" name="kategori_pertanyaan"> --}}
                                    
                                    <select name="kategori_id" class="form-control" id="">
                                        <option disabled selected>--- Kategori ---</option>
                                        @foreach ($pertanyaans as $pertanyaan)
                                            <option value="{{ $pertanyaan->id }}">{{ $pertanyaan->nama_kategori }}</option>
                                        @endforeach
                                    </select>


                                    @error('pertanyaan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="isi_pertanyaan">Isi Pertanyaan</label>
                                    {{-- <input type="" class="form-control @error('isi_pertanyaan') is-invalid @enderror" id="isi_pertanyaan"
                                        placeholder="Katasandi Dosens" name="isi_pertanyaan"> --}}

                                    <textarea name="isi_pertanyaan" id="" cols="30" rows="5" class="form-control"></textarea>

                                    @error('isi_pertanyaan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('pertanyaans.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
