@extends('layouts.app')
@section('title', 'Tambah Informasi Donatur')

@section('title-header', 'Tambah Informasi Donatur')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sumber_pendanaan.index') }}">Informasi Donatur</a></li>
    <li class="breadcrumb-item active">Tambah Informasi Donatur</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Informasi Donatur</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sumber_pendanaan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tahun_dana">Tahun Dana</label>
                                    <input type="text" class="form-control @error('tahun_dana') is-invalid @enderror" id="tahun_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('tahun_dana') }}" name="tahun_dana">

                                    @error('tahun_dana')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="total_dana">Total Dana</label>
                                    <input type="text" class="form-control @error('total_dana') is-invalid @enderror" id="total_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('total_dana') }}" name="total_dana">

                                    @error('total_dana')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="sumber_dana">Sumber Dana</label>
                                    <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror" id="sumber_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('sumber_dana') }}" name="sumber_dana">

                                    @error('sumber_dana')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="sumber_pendanaans">id inovator</label>
                                    {{-- <select type="number" class="form-control @error('id') is-invalid @enderror" id="id"
                                        placeholder="id" value="{{ old('id') }}" name="id"> --}}
                                    
                                    <select name="id_inovator" class="form-control" id="">
                                        <option disabled selected> id </option>
                                        @foreach ($sumber_pendanaans as $sumber_pendanaan)
                                            <option value="{{ $sumber_pendanaan->id }}">{{ $sumber_pendanaan->id }}</option>
                                        @endforeach
                                    </select>


                                    @error('sumber_pendanaan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('sumber_pendanaan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
