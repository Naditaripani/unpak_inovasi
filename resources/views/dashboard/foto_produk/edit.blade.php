@extends('layouts.app')
@section('title', 'Ubah Data Anggota Tim')

@section('title-header', 'Ubah Data Anggota Tim')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('foto_produk.index') }}">Data Anggota Tim</a></li>
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
                    <form action="{{ route('foto_produk.update', $foto_produk->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="foto" class="form-label">foto</label>
                                    @if($foto_produk->foto)
                                        <img src="{{ asset('fotoproduk/'. $foto_produk->foto) }}" class="img-preview img-fluid mb-3 col-sm-2 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-2">
                                    @endif
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Masukkan Kode Prodi" value="{{ old('foto', $foto_produk->foto) }}" name="foto" onchange="previewImage()">

                                    @error('foto')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('foto_produk.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage()
        {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection