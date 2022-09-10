@extends('layouts.app')
@section('title', 'Ubah Data Anggota Tim')

@section('title-header', 'Ubah Data Anggota Tim')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('anggota_tim.index') }}">Data Anggota Tim</a></li>
    <li class="breadcrumb-item active">Ubah Data Anggota Tim</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Anggota Tim</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('anggota_tim.update', $anggota_tim->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('nidn', $anggota_tim->nidn) }}" name="nidn">

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="keahlian">Insitusi</label>
                                    <input type="" class="form-control @error('keahlian') is-invalid @enderror" id="keahlian"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('keahlian', $anggota_tim->keahlian) }}" name="keahlian">

                                    @error('keahlian')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="anggota_tims">info_inovator anggota_tim</label>
                                    
                                    <select class="form-control @error('info_inovator') is-invalid @enderror" id="anggota_tim" name="id_inovator">
                                       
                                        @foreach ($info_inovators as $info_inovator)
                                            <option value="{{ $info_inovator->id }}" @if ($anggota_tim->info_inovator->id == $info_inovator->id) selected @endif>
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
                                <a href="{{route('anggota_tim.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection