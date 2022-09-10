@extends('layouts.app')
@section('title', 'Data Donator')

@section('title-header', 'Data Donator')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Donator</li>
@endsection

@section('action_btn')
    <a href="{{route('sumber_pendanaan.create')}}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Donator</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Dana</th>
                                    <th>Total Dana</th>
                                    <th>Sumber Dana</th>
                                    <th>id </th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sumber_pendanaans as $sumber_pendanaan)
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sumber_pendanaan->tahun_dana }}</td>
                                        <td>{{ $sumber_pendanaan->total_dana }}</td>
                                        <td>{{ $sumber_pendanaan->sumber_dana }}</td>
                                        <td>{{ $sumber_pendanaan->info_inovator->id ?? 'Tidak ada id' }}</td>

                                        
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('sumber_pendanaan.edit', $sumber_pendanaan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $sumber_pendanaan->id }}" action="{{ route('sumber_pendanaan.destroy', $sumber_pendanaan->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$sumber_pendanaan->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
                                        {{-- {{ $sumber_pendanaans->links() }} --}}
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