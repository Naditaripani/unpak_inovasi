@extends('layouts.app')
@section('title', 'Ubah Data pengguna')

@section('title-header', 'Ubah Data pengguna')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data pengguna</a></li>
    <li class="breadcrumb-item active">Ubah Data pengguna</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data pengguna</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="number" class="form-control @error('username') is-invalid @enderror" id="username"
                                        placeholder="Masukkan NIDN / Kode prodi" value="{{ old('username', $user->username) }}" name="username">

                                    @error('username')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="role">Role</label>
                                    <select onchange="changeRole($(this).val())" class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                        @php
                                            $roles = ['admin', 'dosen', 'prodi'];
                                        @endphp
                                        <option value="" selected>---Role---</option>
                                        @foreach ($roles as $role)
                                            <option disabled value="{{ $role }}" @if (old('role', $user->role) == $role) selected @endif>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('role')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="row {{$user->role == 'dosen' ? '' : 'd-none'}}" id="nidn-input-group">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="number" class="form-control @error('nidn') is-invalid @enderror" id="nidn"
                                        placeholder="Masukkan NIDN..." value="{{ old('nidn') }}" name="nidn">

                                    @error('nidn')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
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