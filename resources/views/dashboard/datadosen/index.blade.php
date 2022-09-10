@extends('layouts.app')
@section('title', 'Data Pribadi Dosen')

@section('title-header', 'Data Pribadi Dosen')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Pribadi Dosen</li>
@endsection

@section('action_btn')
    <a href="{{route('datadosen.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Pribadi Dosen</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIDN</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datadosens as $datadosen)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $datadosen->file_foto }}</td> --}}
                                        <td>
                                            <img src="{{ asset('fotodiri/'. $datadosen->file_foto) }}" height="30%" width="30%" alt="">
                                        </td>
                                        <td>{{ $datadosen->nidn }}</td>
                                        <td>{{ $datadosen->nama }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('datadosen.show', $datadosen->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('datadosen.edit', $datadosen->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $datadosen->id }}" action="{{ route('datadosen.destroy', $datadosen->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$datadosen->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{-- {{ $datadosens->links() }} --}}
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