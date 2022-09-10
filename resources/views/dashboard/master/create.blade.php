@extends('layouts.app')
@section('title', 'Tambah Data Jenis dan Bidang Inovasi')

@section('title-header', 'Tambah Data Jenis dan Bidang Inovasi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Data Jenis dan Bidang Inovasi</a></li>
    <li class="breadcrumb-item active">Tambah Data Jenis dan Bidang Inovasi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Inovasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('master.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kategori">Kategori Inovasi</label>
                                    {{-- <select type="number" class="form-control @error('kategori_pertanyaan') is-invalid @enderror" id="kategori_pertanyaan"
                                        placeholder="Masukkan Kategori Pertanyaan" value="{{ old('kategori_pertanyaan') }}" name="kategori_pertanyaan"> --}}
                                    
                                    <select name="kategori_master" class="form-control" id="">
                                        <option value="Jenis Inovasi">Jenis Inovasi</option>
                                        <option value="Bidang Inovasi">Bidang Inovasi</option>
                                    </select>


                                    @error('kategori_master')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="isi_master">Isi</label>
                                    <input type="" class="form-control @error('isi_master') is-invalid @enderror" id="isi_master"
                                        placeholder="Isi Jenis atau Bidang Inovasi" name="isi_master">

                                    {{-- <textarea name="isi_master" id="" cols="30" rows="10" class="form-control"></textarea> --}}

                                    @error('isi_master')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('master.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
