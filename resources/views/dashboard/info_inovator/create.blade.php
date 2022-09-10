@extends('layouts.app')
@section('title', 'Tambah Informasi Inovator')

@section('title-header', 'Tambah Informasi Inovator')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('info_inovator.index') }}">Informasi Inovator</a></li>
    <li class="breadcrumb-item active">Tambah Informasi Inovator</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Informasi Inovator</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info_inovator.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('nidn') }}" name="nidn">

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="institusi">Institusi</label>
                                    <input type="text" class="form-control @error('institusi') is-invalid @enderror" id="institusi"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('institusi') }}" name="institusi">

                                    @error('institusi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="alamat_kontak">Alamat Kontak</label>
                                    <input type="text" class="form-control @error('alamat_kontak') is-invalid @enderror" id="alamat_kontak"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('alamat_kontak') }}" name="alamat_kontak">

                                    @error('alamat_kontak')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="phone">phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('phone') }}" name="phone">

                                    @error('phone')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="fax">fax</label>
                                    <input type="number" class="form-control @error('fax') is-invalid @enderror" id="fax"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('fax') }}" name="fax">

                                    @error('fax')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                      
                        

                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('info_inovator.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
