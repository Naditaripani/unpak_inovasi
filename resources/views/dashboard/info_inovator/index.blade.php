@extends('layouts.app')
@section('title', 'Data Pertanyaan')

@section('title-header', 'Data Pertanyaan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Pertanyaan</li>
@endsection

@section('action_btn')
    <a href="{{route('info_inovator.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Inovator</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIDN</th>
                                    <th>Institusi</th>
                                    <th>Alamat Kontak</th>
                                    <th>Phone</th>
                                    <th>Fax</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($info_inovators as $info_inovator)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $info_inovator->nidn }}</td>
                                        <td>{{ $info_inovator->institusi }}</td>
                                        <td>{{ $info_inovator->alamat_kontak }}</td>
                                        <td>{{ $info_inovator->phone }}</td>
                                        <td>{{ $info_inovator->fax }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('info_inovator.edit', $info_inovator->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $info_inovator->id }}" action="{{ route('info_inovator.destroy', $info_inovator->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$info_inovator->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{-- {{ $info_inovators->links() }} --}}
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