@extends('layouts.app')
@section('title', 'Tambah Data Dilaksanakan')

@section('title-header', 'Tambah Data Dilaksanakan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('info_dilaksanakan.index') }}">Data Dilaksanakan</a></li>
    <li class="breadcrumb-item active">Tambah Data Dilaksanakan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Dilaksanakan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('info_dilaksanakan.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                      
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="judul_inovator">Judul Inovasi</label>
                                    <input type="text" class="form-control @error('judul_inovator') is-invalid @enderror" id="judul_inovator"
                                        placeholder="Judul Inovasi" value="{{ old('judul_inovator') }}" name="judul_inovator">

                                    @error('judul_inovator')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="sub_judul">Sub judul</label>
                                    <input type="text" class="form-control @error('sub_judul') is-invalid @enderror" id="sub_judul"
                                        placeholder="Sub Judul" value="{{ old('sub_judul') }}" name="sub_judul">

                                    @error('sub_judul')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="nama_program">Nama Program</label>
                                    <input type="text" class="form-control @error('nama_program') is-invalid @enderror" id="nama_program"
                                        placeholder="Nama Program" value="{{ old('nama_program') }}" name="nama_program">

                                    @error('nama_program')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="kategori">Jenis Inovasi</label>
                                    <select name="jenis" class="form-control" id="">
                                    <option value="" selected disabled>Pilih Jenis Inovasi</option>
                                        <option value="Produk">Produk</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Pasar">Pasar</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>


                                    @error('jenis')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                     
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="kategori">Bidang Inovasi</label>
                                    
                                    <select name="bidang" class="form-control" id="">
                                        <option value="" selected disabled>Pilih Bidang Inovasi</option>
                                        <option value="Teknologi Hankam">Teknologi Hankam</option>
                                        <option value="Teknologi Transportasi">Teknologi Transportasi</option>
                                        <option value="Teknologi Lingkungan">Teknologi Lingkungan</option>
                                        <option value="Teknologi Material">Teknologi Material</option>
                                        <option value="Teknologi ICT">Teknologi ICT</option>
                                        <option value="Teknologi Pertanian">Teknologi Pertanian</option>
                                        <option value="Teknologi Manufaktur">Teknologi Manufaktur</option>
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
                                    <!-- <input type="text" class="form-control @error('manfaat') is-invalid @enderror" id="manfaat"
                                        placeholder="Masukkan Manfaat Inovasi" value="{{ old('manfaat') }}" name="manfaat"> -->
                                        <textarea name="manfaat" id="manfaat" cols="30" rows="5" placeholder="Aplikasi dan Manfaat Inovasi" class="form-control"></textarea>

                                    @error('manfaat')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="lama_program">Lama Program</label>
                                    <input type="number" class="form-control @error('lama_program') is-invalid @enderror" id="lama_program"
                                        placeholder="Lama program/kegiatan yang direncanakan" value="{{ old('lama_program') }}" name="lama_program">

                                    @error('lama_program')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                      
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="berjalan_tahun_sedang">Tahun Berjalan</label>
                                    <input type="number" class="form-control @error('berjalan_tahun_sedang') is-invalid @enderror" id="berjalan_tahun_sedang"
                                        placeholder="Program/kegiatan yang berjalan tahun" value="{{ old('berjalan_tahun_sedang') }}" name="berjalan_tahun_sedang">

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
                                    <!-- <input type="text" class="form-control @error('ringkasan_inovasi') is-invalid @enderror" id="ringkasan_inovasi"
                                        placeholder="Masukkan Kode Prodi" value="{{ old('ringkasan_inovasi') }}" name="ringkasan_inovasi"> -->
                                        <textarea name="ringkasan_inovasi" id="ringkasan_inovasi" cols="30" rows="5" placeholder="Ringkasan Inovasi Yang Dilaksanakan Dengan Pencapaian Yang Diharapkan" class="form-control"></textarea>

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
                                    <!-- <input type="text" class="form-control @error('kebaruan') is-invalid @enderror" id="kebaruan"
                                        placeholder="Kebaruan yang ditawarkan dari inovasi yang dilakukan" value="{{ old('kebaruan') }}" name="kebaruan"> -->
                                        <textarea name="kebaruan" id="kebaruan" cols="30" rows="5" placeholder="Kebaruan yang ditawarkan dari inovasi yang dilakukan" class="form-control"></textarea>

                                    @error('kebaruan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="keunggulan">Keunggulan Inovasi</label>
                                    <!-- <input type="text" class="form-control @error('keunggulan') is-invalid @enderror" id="keunggulan"
                                        placeholder="Keunggulan yang membedakan dengan produk/jasa sejenis yang ada dipasar saat ini" value="{{ old('keunggulan') }}" name="keunggulan"> -->
                                    <textarea name="keunggulan" id="keunggulan" cols="30" rows="5" placeholder="Keunggulan yang membedakan dengan produk/jasa sejenis yang ada dipasar saat ini" class="form-control"></textarea>
                                    @error('keunggulan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    
                                    @foreach ($dosen as $dosens)
                                    <label for="info_dilaksanakans">{{ $dosens->nidn }}</label>
                                            <option value="{{ $dosen->id }}">{{ $dosens->nidn }}</option>
                                        @endforeach
                                   
                                    
                                    <!-- <select name="id_inovator" class="form-control" id="">
                                        <option disabled selected> id </option>
                                        @foreach ($info_dilaksanakans as $info_dilaksanakan)
                                            <option value="{{ $info_dilaksanakan->id }}">{{ $info_dilaksanakan->id }}</option>
                                        @endforeach
                                    </select> -->
                                    <input type="hidden" class="form-control @error('id_pribadi') is-invalid @enderror" id="id_pribadi"
                                        placeholder="" value="{{ Auth::user()->nidn }}" name="id_pribadi">

<h1>{{ Auth::user()->nidn }}</h1>

                                    @error('info_dilaksanakan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('info_dilaksanakan.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
