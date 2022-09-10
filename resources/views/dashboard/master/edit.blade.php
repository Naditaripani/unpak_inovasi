@extends('layouts.app')
@section('title', 'Ubah Data Jenis dan Bidang Inovasi')

@section('title-header', 'Ubah Data Jenis dan Bidang Inovasi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('master.index') }}">Data Jenis dan Bidang Inovasi</a></li>
    <li class="breadcrumb-item active">Ubah Data Jenis dan Bidang Inovasi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Jenis dan Bidang Inovasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('master.update', $master->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kategori_master">Kategori Inovasi</label>
                                    {{-- <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}" name="kode_prodi"> --}}

                                    <select name="kategori_master" class="form-control" id="">
                                        <option value="Jenis Inovasi" @if ($master->kategori_master=='Jenis Inovasi') selected @endif>Jenis Inovasi</option>
                                        <option value="Bidang Inovasi" @if ($master->kategori_master=='Bidang Inovasi') selected @endif>Bidang Inovasi</option>
                                    </select>

                                    @error('kategori_master')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="isi_master">Isi</label>
                                    <input type="text" class="form-control @error('isi_master') is-invalid @enderror" id="isi_master"
                                        placeholder="Masukkan jenis atau bidang inovasi" value="{{ old('isi_master', $master->isi_master) }}" name="isi_master">

                                    @error('isi_master')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('master.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
