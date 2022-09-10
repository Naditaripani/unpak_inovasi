@extends('layouts.app')
@section('title', 'Tambah Data Dilaksanakan')

@section('title-header', 'Tambah Data Dilaksanakan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('info_dilaksanakan.index') }}">Data Dilaksanakan</a></li>
    <li class="breadcrumb-item active">Tambah Data Dilaksanakan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Dilaksanakan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info_dilaksanakan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="info_dilaksanakans">Jenis/Bidang </label>
                                    <!-- {{-- <select type="number" class="form-control @error('kategori_master') is-invalid @enderror" id="kategori_master"
                                        placeholder="Masukkan Kategori info_dilaksanakan" value="{{ old('kategori_master') }}" name="kategori_master"> --}} -->
                                    
                                    <select name="id_master" class="form-control" id="">
                                        <option disabled selected>--- pilihan ---</option>
                                        @foreach ($info_dilaksanakans as $info_dilaksanakan)
                                            <option value="{{ $info_dilaksanakan->id }}">{{ $info_dilaksanakan->kategori_master }}</option>
                                        @endforeach
                                    </select>


                                    @error('info_dilaksanakan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="info_dilaksanakans">Kategori </label>
                                    <!-- {{-- <select type="number" class="form-control @error('isi_master') is-invalid @enderror" id="isi_master"
                                        placeholder="Masukkan Kategori info_dilaksanakan" value="{{ old('isi_master') }}" name="isi_master"> --}} -->
                                    
                                    <select name="id_master" class="form-control" id="">
                                        <option disabled selected>--- pilihan ---</option>
                                        @foreach ($info_dilaksanakans as $info_dilaksanakan)
                                            <option value="{{ $info_dilaksanakan->id }}">{{ $info_dilaksanakan->isi_master }}</option>
                                        @endforeach
                                    </select>


                                    @error('info_dilaksanakan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kebaruan">Kebaruan</label>
                                    <input type="text" class="form-control @error('kebaruan') is-invalid @enderror" id="kebaruan"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('kebaruan') }}" name="kebaruan">

                                    @error('kebaruan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="info_dilaksanakans">id inovator</label>
                                    {{-- <select type="number" class="form-control @error('id') is-invalid @enderror" id="id"
                                        placeholder="id" value="{{ old('id') }}" name="id"> --}}
                                    
                                    <select name="id_inovator" class="form-control" id="">
                                        <option disabled selected> id </option>
                                        @foreach ($info_dilaksanakans as $info_dilaksanakan)
                                            <option value="{{ $info_dilaksanakan->id }}">{{ $info_dilaksanakan->id }}</option>
                                        @endforeach
                                    </select>


                                    @error('info_dilaksanakan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('info_dilaksanakan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
