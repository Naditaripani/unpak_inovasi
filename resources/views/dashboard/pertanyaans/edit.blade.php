@extends('layouts.app')
@section('title', 'Ubah Data Pertanyaan')

@section('title-header', 'Ubah Data Pertanyaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pertanyaans.index') }}">Data Pertanyaan</a></li>
    <li class="breadcrumb-item active">Ubah Data Pertanyaan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Pertanyaan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pertanyaans.update', $pertanyaan->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="pertanyaans">Kategori Pertanyaan</label>
                                    
                                    <select class="form-control @error('kategori') is-invalid @enderror" id="pertanyaan" name="kategori_id">
                                        @foreach ($kategories as $kategori)
                                            <option value="{{ $kategori->id }}" @if ($pertanyaan->kategori->id == $kategori->id) selected @endif>
                                                {{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    

                                    @error('kategori')
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

                                    <textarea name="isi_pertanyaan" id="" cols="100%" rows="5" class="form-control">{{ $pertanyaan->isi_pertanyaan }}</textarea>

                                    @error('isi_pertanyaan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('pertanyaans.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
