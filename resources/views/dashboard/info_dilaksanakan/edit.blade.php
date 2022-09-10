@extends('layouts.app')
@section('title', 'Ubah Data Dilaksanakan')

@section('title-header', 'Ubah Data Dilaksanakan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('info_dilaksanakan.index') }}">Data Dilaksanakan</a></li>
    <li class="breadcrumb-item active">Ubah Data Dilaksanakan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Dilaksanakan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info_dilaksanakan.update', $info_dilaksanakan->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="judul_inovator">Judul Inovator</label>
                                    <input type="text" class="form-control @error('judul_inovator') is-invalid @enderror" id="judul_inovator"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('judul_inovator', $info_dilaksanakan->judul_inovator) }}" name="judul_inovator">

                                    @error('judul_inovator')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="sub_judul">Sub judul</label>
                                    <input type="text" class="form-control @error('sub_judul') is-invalid @enderror" id="sub_judul"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('sub_judul', $info_dilaksanakan->sub_judul) }}" name="sub_judul">

                                    @error('sub_judul')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama_program">Nama Program</label>
                                    <input type="text" class="form-control @error('nama_program') is-invalid @enderror" id="nama_program"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('nama_program', $info_dilaksanakan->nama_program) }}" name="nama_program">

                                    @error('nama_program')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kategori">Jenis</label>
                                    <select name="jenis" class="form-control" id="jenis" value="{{ old('jenis', $info_dilaksanakan->jenis) }}" name="jenis">
                                        <option value="" disabled>---Jenis Inovasi---</option>
                                        <option value="Produk" @if ($info_dilaksanakan->jenis=='Produk') selected @endif>Produk</option>
                                        <option value="Proses"  @if ($info_dilaksanakan->jenis=='Proses') selected @endif>Proses</option>
                                        <option value="Pasar"  @if ($info_dilaksanakan->jenis=='Pasar') selected @endif>Pasar</option>
                                    </select>


                                    @error('jenis')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kategori">Bidang</label>

                                    <select name="bidang" class="form-control" id="bidang" placeholder="Masukkan Kode Prodi" value="{{ old('bidang', $info_dilaksanakan->bidang) }}">
                                        <option value="" disabled>---Bidang Inovasi---</option>
                                        <option value="Teknologi Hankam" @if ($info_dilaksanakan->bidang=='Teknologi Hankam') selected @endif >Teknologi Hankam</option>
                                        <option value="Teknologi Transportasi" @if ($info_dilaksanakan->bidang=='Teknologi Hankam') selected @endif>Teknologi Transportasi</option>
                                        <option value="Teknologi Lingkungan" @if ($info_dilaksanakan->bidang=='Teknologi Lingkungan') selected @endif>Teknologi Lingkungan</option>
                                        <option value="Teknologi Material" @if ($info_dilaksanakan->bidang=='Teknologi Material') selected @endif>Teknologi Material</option>
                                        <option value="Teknologi ICT" @if ($info_dilaksanakan->bidang=='Teknologi ICT') selected @endif>Teknologi ICT</option>
                                        <option value="Teknologi Pertanian" @if ($info_dilaksanakan->bidang=='Teknologi Pertanian') selected @endif>Teknologi Pertanian</option>
                                        <option value="Teknologi Manufaktur" @if ($info_dilaksanakan->bidang=='Teknologi Manufaktur') selected @endif>Teknologi Manufaktur</option>
                                    </select>


                                    @error('bidang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="manfaat">Manfaat</label>
                                    <input type="text" class="form-control @error('manfaat') is-invalid @enderror" id="manfaat"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('manfaat', $info_dilaksanakan->manfaat) }}" name="manfaat">

                                    @error('manfaat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="lama_program">Lama Program</label>
                                    <input type="text" class="form-control @error('lama_program') is-invalid @enderror" id="lama_program"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('lama_program', $info_dilaksanakan->lama_program) }}" name="lama_program">

                                    @error('lama_program')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="berjalan_tahun_sedang"> Tahun Berjalan</label>
                                    <input type="text" class="form-control @error('berjalan_tahun_sedang') is-invalid @enderror" id="berjalan_tahun_sedang"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('berjalan_tahun_sedang', $info_dilaksanakan->berjalan_tahun_sedang) }}" name="berjalan_tahun_sedang">

                                    @error('berjalan_tahun_sedang')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="ringkasan_inovasi">Ringkasan Inovasi</label>
                                    <input type="text" class="form-control @error('ringkasan_inovasi') is-invalid @enderror" id="ringkasan_inovasi"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('ringkasan_inovasi', $info_dilaksanakan->ringkasan_inovasi) }}" name="ringkasan_inovasi">

                                    @error('ringkasan_inovasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kebaruan">Kebaruan</label>
                                    <input type="text" class="form-control @error('kebaruan') is-invalid @enderror" id="kebaruan"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('kebaruan', $info_dilaksanakan->kebaruan) }}" name="kebaruan">

                                    @error('kebaruan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="keunggulan">Keunggulan</label>
                                    <input type="text" class="form-control @error('keunggulan') is-invalid @enderror" id="keunggulan"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('keunggulan', $info_dilaksanakan->keunggulan) }}" name="keunggulan">

                                    @error('keunggulan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="info_dilaksanakans">info_inovator dilaksanakan</label>
                                    
                                    <select class="form-control @error('info_inovator') is-invalid @enderror" id="info_dilaksanakan" name="id_inovator">
                                       
                                        @foreach ($info_inovators as $info_inovator)
                                            <option value="{{ $info_inovator->id }}" @if ($info_dilaksanakan->info_inovator->id == $info_inovator->id) selected @endif>
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
                                <a href="{{route('info_dilaksanakan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection