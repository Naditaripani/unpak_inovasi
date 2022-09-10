@extends('layouts.app')
@section('title', 'Daftar info dilaksanakan')

@section('title-header', 'Daftar Kategori info dilaksanakan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Daftar info dilaksanakan</li>
@endsection

@section('action_btn')
    <a href="{{route('info_dilaksanakan.create')}}" class="btn btn-default">Tambah info dilaksanakan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data info dilaksanakan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama jenis</th>
                                    <!-- <th>Nama Kategori</th> -->
                                    <th>Judul Inovator</th>
                                    <!-- <th>Sub Judul</th> -->
                                    <th>Nama Program</th>
                                    <!-- <th>Manfaaat</th> -->
                                    <!-- <th>Lama Program</th> -->
                                    <!-- <th>Tahun Berjalan</th>
                                    <th>Ringkasan Inovasi</th>
                                    <th>Kebaruan</th>
                                    <th>jenis</th> -->
                                    <!-- <th>bidang</th>
                                    <th>Keunggulan</th> -->
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($info_dilaksanakans as $info_dilaksanakan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        
                                            
                                        <td>{{ $info_dilaksanakan->jenis }}</td>
                                        <!-- <td>{{ $info_dilaksanakan->bidang }}</td> -->
                                        <td>{{ $info_dilaksanakan->judul_inovator }}</td>
                                        <!-- <td>{{ $info_dilaksanakan->sub_judul }}</td> -->
                                        <td>{{ $info_dilaksanakan->nama_program }}</td>
                                        <!-- <td>{{ $info_dilaksanakan->manfaat }}</td> -->
                                        <!-- <td>{{ $info_dilaksanakan->lama_program }}</td> -->
                                        <!-- <td>{{ $info_dilaksanakan->berjalan_tahun_sedang }}</td>
                                        <td>{{ $info_dilaksanakan->ringkasan_inovasi }}</td>
                                        <td>{{ $info_dilaksanakan->kebaruan }}</td>
                                       
                                        <td>{{ $info_dilaksanakan->keunggulan }}</td> -->
                                        <!-- <td>{{ $info_dilaksanakan->info_inovator->id ?? 'Tidak ada id' }}</td> -->


                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('info_dilaksanakan.show', $info_dilaksanakan->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('info_dilaksanakan.edit', $info_dilaksanakan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $info_dilaksanakan->id }}" action="{{ route('info_dilaksanakan.destroy', $info_dilaksanakan->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$info_dilaksanakan->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $info_dilaksanakans->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
@endsection