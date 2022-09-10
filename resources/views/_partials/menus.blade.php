@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>

@if (Auth::user()->role == 'admin')
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Data Pengguna</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'kategoris.index' ? 'active' : '' }}" href="{{ route('kategoris.index') }}">
        <i class="fas fa-list-ul text-success"></i>
        <span class="nav-link-text">Data Kategori</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'pertanyaans.index' ? 'active' : '' }}" href="{{ route('pertanyaans.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Daftar Pertanyaan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'master.index' ? 'active' : '' }}" href="{{ route('master.index') }}">
        <i class="fas fa-file text-primary"></i>
        <span class="nav-link-text">Daftar Jenis dan Bentuk Inovasi</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'datadosen.index' ? 'active' : '' }}" href="{{ route('datadosen.index') }}">
        <i class="fas fa-file text-primary"></i>
        <span class="nav-link-text">Data Pribadi Dosen</span>
    </a>
</li>
@endif

@if (Auth::user()->role == 'dosen')

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'info_inovator.index' ? 'active' : '' }}" href="{{ route('info_inovator.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Inovator</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'mitra.index' ? 'active' : '' }}" href="{{ route('mitra.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Mitra</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'anggota_tim.index' ? 'active' : '' }}" href="{{ route('anggota_tim.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Anggota Tim</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'sumber_pendanaan.index' ? 'active' : '' }}" href="{{ route('sumber_pendanaan.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Donatur</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'foto_produk.index' ? 'active' : '' }}" href="{{ route('foto_produk.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Foto</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'info_dilaksanakan.index' ? 'active' : '' }}" href="{{ route('info_dilaksanakan.index') }}">
        <i class="fas fa-file text-success"></i>
        <span class="nav-link-text">Data Dilaksanakan</span>
    </a>
</li>


@endif