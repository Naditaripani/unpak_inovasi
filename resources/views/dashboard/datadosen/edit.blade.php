@extends('layouts.app')
@section('title', 'Ubah Data Pribadi Dosen')

@section('title-header', 'Ubah Data Pribadi Dosen')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('datadosen.index') }}">Data Pribadi Dosen</a></li>
    <li class="breadcrumb-item active">Ubah Data Pribadi Dosen</li>
    @endsection
    
    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Pribadi Dosen</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('datadosen.update', $datadosen->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="file_foto">Foto Diri</label>
                                        @if($datadosen->file_foto)
                                            <img src="{{ asset('fotodiri/'. $datadosen->file_foto) }}" class="img-preview img-fluid mb-3 col-sm-2 d-block">
                                        @else
                                            <img class="img-preview img-fluid mb-3 col-sm-2">
                                        @endif
                                    <input type="file" class="form-control @error('file_foto') is-invalid @enderror" id="file_foto"
                                        placeholder="Masukkan Foto Diri" value="{{ old('file_foto'), $datadosen->file_foto }}" name="file_foto" onchange="previewImage()">


                                    @error('file_foto')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nip">NIP</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                        placeholder="Masukkan NIP" value="{{ old('nip', $datadosen->nip) }}" name="nip">

                                    @error('nip')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan NIDN" value="{{ old('nidn', $datadosen->nidn) }}" name="nidn">

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama Lengkap" value="{{ old('nama', $datadosen->nama) }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $datadosen->tempat_lahir) }}" name="tempat_lahir">

                                    @error('tempat_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                        placeholder="Masukkan Tanggal Lahir" value="{{ old('tgl_lahir', $datadosen->tgl_lahir) }}" name="tgl_lahir">

                                    @error('tgl_lahir')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="jk">Jenis Kelamin</label>
                                    {{-- <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}" name="kode_prodi"> --}}
                                    
                                    <select name="jk" class="form-control" id="">
                                        <option value="Laki-laki" @if ($datadosen->jk=='Laki-laki') selected @endif>Laki-laki</option>
                                        <option value="Perempuan" @if ($datadosen->jk=='Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                    
                                    @error('jk')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama"
                                    placeholder="Masukkan Agama" value="{{ old('agama', $datadosen->agama) }}" name="agama">
                                    
                                    @error('agama')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    {{-- <input type="number" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi"
                                    placeholder="Masukkan Kode Prodi" value="{{ old('kode_prodi', $prodi->kode_prodi) }}" name="kode_prodi"> --}}
                                    
                                    <select name="status_perkawinan" class="form-control" id="">
                                        <option value="Belum Kawin" @if ($datadosen->status_perkawinan=='Belum Kawin') selected @endif>Kawin</option>
                                        <option value="Kawin" @if ($datadosen->status_perkawinan=='Kawin') selected @endif>Belum Kawin</option>
                                        <option value="Cerai" @if ($datadosen->status_perkawinan=='Cerai') selected @endif>Cerai</option>
                                    </select>
                                    
                                    @error('status_perkawinan')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="no_ktp">Nomor KTP</label>
                                    <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp"
                                    placeholder="Masukkan Nomor KTP" value="{{ old('no_ktp', $datadosen->no_ktp) }}" name="no_ktp">
                                    
                                    @error('no_ktp')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    {{-- <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    placeholder="Masukkan Alamat" value="{{ old('alamat', $datadosen->alamat) }}" name="alamat"> --}}
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ old('alamat', $datadosen->alamat) }}</textarea>
                                    @error('alamat')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="no_tlp">Nomor Telephone</label>
                                    <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp"
                                    placeholder="Masukkan Nomor Telephone" value="{{ old('no_tlp', $datadosen->no_tlp) }}" name="no_tlp">
                                    
                                    @error('no_tlp')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Masukkan Email" value="{{ old('email', $datadosen->email) }}" name="email">
                                    
                                    @error('email')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk"
                                    placeholder="Masukkan Tanggal Masuk" value="{{ old('tgl_masuk', $datadosen->tgl_masuk) }}" name="tgl_masuk">
                                    
                                    @error('tgl_masuk')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="email2">Email Ke-2</label>
                                    <input type="email" class="form-control @error('email2') is-invalid @enderror" id="email2"
                                    placeholder="Masukkan Email Ke-2" value="{{ old('email2', $datadosen->email2) }}" name="email2">
                                    
                                    @error('email2')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="sinta">Sinta</label>
                                    <input type="text" class="form-control @error('sinta') is-invalid @enderror" id="sinta"
                                    placeholder="Masukkan Sinta" value="{{ old('sinta', $datadosen->sinta) }}" name="sinta">
                                    
                                    @error('sinta')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="matkul">Mata Kuliah</label>
                                    <input type="text" class="form-control @error('matkul') is-invalid @enderror" id="matkul"
                                    placeholder="Masukkan Mata Kuliah" value="{{ old('matkul', $datadosen->matkul) }}" name="matkul">
                                    
                                    @error('matkul')
                                    <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{route('datadosen.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
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
            const image = document.querySelector('#file_foto');
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