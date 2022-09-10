@extends('layouts.app')
@section('title', 'Detail Data Pribadi Dosen')

@section('title-header', 'Detail Data Pribadi {{ $datadosen->nama }}')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Detail Data Pribadi {{ $datadosen->nama }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Detail Data Pribadi {{ $datadosen->nama }}</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <tbody>
                                <tr>
                                   <td colspan="3" align="center"><img src="{{ asset('fotodiri/'. $datadosen->file_foto) }}" height="20%" width="20%" alt=""></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->nip }}</td>
                                </tr>
                                <tr>
                                    <td>NIDN</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->nidn }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->tgl_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->jk }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Status Perkawinan</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->status_perkawinan }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor KTP</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telephone</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->no_tlp }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->email }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->tgl_masuk }}</td>
                                </tr>
                                <tr>
                                    <td>Email Ke-2</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->email2 }}</td>
                                </tr>
                                <tr>
                                    <td>Sinta</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->sinta }}</td>
                                </tr>
                                <tr>
                                    <td>Mata Kuliah</td>
                                    <td>:</td>
                                    <td>{{ $datadosen->matkul }}</td>
                                </tr>
                                <tr>
                                    <td><a href="{{route('datadosen.index')}}" class="btn btn-sm btn-primary">Kembali</a></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            }) 
        }
    </script>
@endsection --}}