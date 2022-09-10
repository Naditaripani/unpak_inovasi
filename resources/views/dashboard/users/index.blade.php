@extends('layouts.app')
@section('title', 'Data Pengguna')

@section('title-header', 'Data Pengguna')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Pengguna</a></li>
@endsection

@if (!$isDetail)
@section('action_btn')
<a href="{{route('users.create')}}" class="btn btn-default">Tambah Data</a>
@endsection
@endif

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Pengguna</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    @if (!$isDetail)
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>
                                            {{ str()->title($user->role) }}
                                        </td>
                                        @if (!$isDetail)
                                        <td class="d-flex jutify-content-center">
                                            @php
                                                $path = 'users';
                                                $id = $user->id;
                                                if($user->role == 'dosen'){
                                                    $id = $user->dosens->first()->id;
                                                    $path = 'dosens';
                                                }elseif($user->role == 'prodi'){
                                                    $id = $user->prodis->first()->id;
                                                    $path = 'prodis';
                                                }
                                            @endphp
                                            <a href="{{route($path . '.show', $id)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{route($path . '.edit', $id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$user->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                        @endif
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
                                        {{ $users->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @if ($isDetail)
                <div class="card-footer"><a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Kembali</a></div>
                @endif
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