@extends('layouts.app')
@section('title', 'Ubah Data Donatur')

@section('title-header', 'Ubah Data Donatur')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sumber_pendanaan.index') }}">Data Donatur</a></li>
    <li class="breadcrumb-item active">Ubah Data Donatur</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Donatur</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sumber_pendanaan.update', $sumber_pendanaan->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tahun_dana">Tahun Dana</label>
                                    <input type="" class="form-control @error('tahun_dana') is-invalid @enderror" id="tahun_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('tahun_dana', $sumber_pendanaan->tahun_dana) }}" name="tahun_dana">

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
                                    <input type="" class="form-control @error('total_dana') is-invalid @enderror" id="total_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('total_dana', $sumber_pendanaan->total_dana) }}" name="total_dana">

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
                                    <input type="" class="form-control @error('sumber_dana') is-invalid @enderror" id="sumber_dana"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('sumber_dana', $sumber_pendanaan->sumber_dana) }}" name="sumber_dana">

                                    @error('sumber_dana')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="sumber_pendanaans">info_inovator sumber_pendanaan</label>
                                    
                                    <select class="form-control @error('info_inovator') is-invalid @enderror" id="sumber_pendanaan" name="id_inovator">
                                       
                                        @foreach ($info_inovators as $info_inovator)
                                            <option value="{{ $info_inovator->id }}" @if ($sumber_pendanaan->info_inovator->id == $info_inovator->id) selected @endif>
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
                                <a href="{{route('sumber_pendanaan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection