@extends('layouts.app')
@section('title', 'Tambah Data pengguna')

@section('title-header', 'Tambah Data pengguna')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data pengguna</a></li>
    <li class="breadcrumb-item active">Tambah Data pengguna</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data pengguna</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="username">Kode Prodi</label>
                                    <input type="number" class="form-control @error('username') is-invalid @enderror" id="username"
                                        placeholder="Masukkan kode prodi..." value="{{ old('username') }}" name="username">

                                    @error('username')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="role">Level</label>
                                    <select onchange="changeRole($(this).val())" class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                        @php
                                            $roles = ['admin', 'dosen', 'prodi'];
                                        @endphp
                                        <option value="" disabled selected>---Level---</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" @if (old('role') == $role) selected @endif>
                                                {{ ucfirst($role) }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('role')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row d-none" id="nidn-input-group">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    {{-- <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan NIDN..." value="{{ old('nidn') }}" name="nidn"> --}}
                                    <select name="nidn" class="form-control" id="">
                                        <option disabled selected>--- NIDN ---</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nidn }}</option>
                                        @endforeach
                                    </select>

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama lengkap / Nama prodi</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama lengkap / Nama prodi..." value="{{ old('nama') }}" name="nama">

                                    @error('nama')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="password">Katasandi</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Katasandi pengguna" name="password">

                                    @error('password')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="confirmation_password">Konfirmasi katasandi</label>
                                    <input type="password" class="form-control @error('confirmation_password') is-invalid @enderror"
                                        id="confirmation_password" placeholder="Konfirmasi katasandi pengguna"
                                        name="confirmation_password">

                                    @error('confirmation_password')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changeRole(value) {
            if(value == 'dosen'){
                $('#nidn-input-group').removeClass('d-none')
            } else {
                $('#nidn-input-group').addClass('d-none')
            }
        }
    </script>
@endsection