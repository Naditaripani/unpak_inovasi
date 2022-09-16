@extends('layouts.app')
@section('title', 'Tambah Informasi Kemajuan')

@section('title-header', 'Tambah Informasi Kemajuan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('info_kemajuan.index') }}">Informasi Kemajuan</a></li>
    <li class="breadcrumb-item active">Tambah Informasi Kemajuan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Informasi Kemajuan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info_kemajuan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <h4 class="mb-0">A. Informasi Digital</h4>
                                    <tr>
                                        <th>No</th>
                                        <th>Uraian</th>
                                        <th>Sudah/Belum Tercapai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                     @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($pertanyaans as $pertanyaan )
                                        <tr>
                                            <td>{{ $i++; }}</td>
                                            <td>{{ $pertanyaan->isi_pertanyaan }}</td>
                                            <td>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mb-3">
                                                        {{-- <label for="jawaban">jawaban</label> --}}
                                                        <input type="radio" class="@error('jawaban') is-invalid @enderror" id="jawaban"
                                                            placeholder="jawaban" value="{{ old('jawaban') }}" name="jawaban[{{ $pertanyaan->id }}]">
                                                                Belum
                                                        @error('jawaban')
                                                            <div class="d-block invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group mb-3">
                                                        {{-- <label for="jawaban">jawaban</label> --}}
                                                        <input type="radio" class="@error('jawaban') is-invalid @enderror" id="jawaban"
                                                            placeholder="jawaban" value="{{ old('jawaban') }}" name="jawaban[{{ $pertanyaan->id }}]">
                                                            Sudah
                                                        @error('jawaban')
                                                            <div class="d-block invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group mb-3">
                                                            {{-- <label for="keterangan">Keterangan</label> --}}
                                                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                                                placeholder="Keterangan" value="{{ old('keterangan') }}" name="keterangan">

                                                            @error('keterangan')
                                                                <div class="d-block invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        
                                        
                                    </tr>
                                        </tbody>
                            </table>
                        </div><br>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('info_kemajuan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
