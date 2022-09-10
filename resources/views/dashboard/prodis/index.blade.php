@extends('layouts.app')
@section('title', 'Detail Prodi')

@section('title-header', 'Detail Prodi')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Detail Prodi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Detail Prodi</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Kode Prodi</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prodis as $prodi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->nama_prodi }}</td>
                                        <td>{{ $prodi->kode_prodi }}</td>
                                        <td>{{ ucfirst($prodi->user->role) }}</td>
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
                                        {{ $prodis->links() }}
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