@extends('layouts.app')
@section('title', 'Tambah Informasi Anggota Tim')

@section('title-header', 'Tambah Informasi Anggota Tim')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('anggota_tim.index') }}">Informasi Anggota Tim</a></li>
    <li class="breadcrumb-item active">Tambah Informasi Anggota Tim</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Informasi Anggota Tim</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('anggota_tim.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">Pilih Dosen</label>
                                    <!-- <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('nidn') }}" name="nidn"> -->
                                <select name="nidn" id="nidn" class="form-control">
                                    <option disabled selected>--- Pilih Dosen ---</option>
                                        @foreach ($anggota_tims as $anggota_tim)
                                            <option value="{{ $anggota_tim->id }}">{{ $anggota_tim->nidn }}</option>
                                        @endforeach
                                    </select>

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="keahlian">keahlian</label>
                                    <input type="text" class="form-control @error('keahlian') is-invalid @enderror" id="keahlian"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('keahlian') }}" name="keahlian">

                                    @error('keahlian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="anggota_tims">id inovator</label>
                                    {{-- <select type="number" class="form-control @error('id') is-invalid @enderror" id="id"
                                        placeholder="id" value="{{ old('id') }}" name="id"> --}}
                                    
                                    <select name="id_inovator" class="form-control" id="">
                                        <option disabled selected> id </option>
                                        @foreach ($anggota_tims as $anggota_tim)
                                            <option value="{{ $anggota_tim->id }}">{{ $anggota_tim->id }}</option>
                                        @endforeach
                                    </select>


                                    @error('anggota_tim')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('anggota_tim.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
