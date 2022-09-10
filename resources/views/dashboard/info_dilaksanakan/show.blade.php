@extends('layouts.app')
@section('title', 'Detail Data Inovasi')

@section('title-header', 'Detail Data Pribadi {{ $info_dilaksanakan->nama }}')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Detail Data Pribadi {{ $info_dilaksanakan->nama }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Detail Data Inovasi {{ $info_dilaksanakan->nama_program }}</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <tbody>
                                <tr>
                                    <td>Judul Inovator</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->judul_inovator }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Judul</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->sub_judul }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Program</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->nama_program }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Inovasi</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Bidang Inovasi</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->bidang }}</td>
                                </tr>
                                <tr>
                                    <td>manfaat</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->manfaat }}</td>
                                </tr>
                                <tr>
                                    <td>Lama Program</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->lama_program }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun berjalan</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->berjalan_tahun_sedang}}</td>
                                </tr>
                                <tr>
                                    <td>Ringkasan Inovasi</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->ringkasan_inovasi }}</td>
                                </tr>
                                <tr>
                                    <td>Kebaruan</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->kebaruan }}</td>
                                </tr>
                                <tr>
                                    <td>Keunggulan</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->keunggulan }}</td>
                                </tr>
                                <tr>
                                    <td>id</td>
                                    <td>:</td>
                                    <td>{{ $info_dilaksanakan->id_pribadi }}</td>
                                </tr>
                                <tr>
                                    <td><a href="{{route('info_dilaksanakan.index')}}" class="btn btn-sm btn-primary">Kembali</a></td>
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