@extends('layouts.template')
@section('content')
    <style>
.profile-image-container {
    position: relative; /* Pastikan kontainer gambar menggunakan posisi relatif */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-user-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 50%;
}

.ubah-foto-btn {
    margin-top: 10px;
}

/* Hide the input file */
#upload_foto {
    display: none;
}

/* Style for the edit icon */
.edit-icon {
    position: absolute;
    bottom: 15px; /* Atur jarak dari bawah */
    right: 15px;  /* Atur jarak dari kanan */
    background-color: white;
    border-radius: 50%;
    padding: 8px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    z-index: 10;  /* Pastikan ikon berada di atas gambar */
}

.edit-icon i {
    font-size: 18px;
    color: #007bff;
}

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="profile-image-container">
                            <img class="profile-user-img img-fluid img-circle" src="{{ route('profile.photo') }}" alt="User profile picture">
                            <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="upload_foto" class="edit-icon">
                                    <i class="fas fa-edit"></i> <!-- Icon edit -->
                                </label>
                                <input type="file" id="upload_foto" name="foto" accept="image/*" onchange="this.form.submit()">
                            </form>
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>
                        <p class="text-muted text-center">{{ auth()->user()->level->level_nama }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->username }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->nama }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Tingkat Level</b> <a class="float-right" style="pointer-events: none; color:black">{{ auth()->user()->level->level_nama }}</a>
                            </li>
                        </ul>

                        <a href="{{ url('/') }}" class="btn btn-primary btn-block"><b>Kembali</b></a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-block"><b>Edit Profil</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img @if (file_exists(public_path(
                        'storage/uploads/profile_pictures/' .
                            auth()->user()->username .
                            '/' .
                            auth()->user()->username .
                            '_profile.png'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.png') }}" @endif
                @if (file_exists(public_path(
                            'storage/uploads/profile_pictures/' .
                                auth()->user()->username .
                                '/' .
                                auth()->user()->username .
                                '_profile.jpg'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpg') }}" @endif
                @if (file_exists(public_path(
                            'storage/uploads/profile_pictures/' .
                                auth()->user()->username .
                                '/' .
                                auth()->user()->username .
                                '_profile.jpeg'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpeg') }}" @endif
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/profile') }}" class="d-block">{{ auth()->user()->username }}</a>
        </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Level User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data User</p>
                </a>
            </li>
            <li class="nav-header">Data Barang</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>Kategori Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Transaksi Penjualan</p>
                </a>
            </li>
            <li class="nav-header">Data Supplier</li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ $activeMenu == 'supplier' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data Supplier</p>
                </a>
            </li>
        </ul>
    </nav>
</div>