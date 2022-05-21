@extends('master/main')

@section('title', 'tambah_petugas')

@section('active2' , 'active')
@section('page-heading')

<div class="page-heading">
    <h3 style="margin: 0px 0px 2px 20px">Data Barang</h3>

    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
         
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->nama }}</h6>
                                <?php
                                if(Auth::user()->id_level == 1){
                                    $level1 = "Administrator";
                                    $foto1 = Auth::user()->foto;
                                }else{
                                    $level1 = "Donatur";
                                    $foto1 = Auth::user()->foto;
                                }
                                ?>
                                <p class="mb-0 text-sm text-gray-600">{{ $level1 }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('img/1.jpg')}}" alt="Face 1">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ Auth::user()->nama }}</h6>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
@endsection

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="tambah_barang" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Kategori Barang</label>
                                                <select name="id_kategori" id="id_kategori" class="form-control">
                                                    <option>--- Pilih Kategori ---</option>
                                                   
                                                    <option>
                                                        @foreach($ka as $ka)
                                                        <option value="{{ $ka->id }}"> {{ $ka->id }} - {{ $ka->gender }} - {{ $ka->pemakai }}  - {{ $ka->kat }}  - {{ $ka->ukuran }}</option>
                                                        @endforeach 
                                                    </option>
                                                 
                                                    </select>
                                        </div>
                                    </div>

                                    @if(auth()->user()->id_level == "1")
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Donatur</label>
                                                <select name="id_user" id="id_user" class="form-control">
                                                    <option>--- Pilih Donatur---</option>
                                                    <option>
                                                        @foreach($user as $kb)
                                                        <option value="{{ $kb->id }}">{{ $kb->id }} - {{ $kb->nama }}</option>
                                                        @endforeach 
                                                    </option>
                                                 
                                                    </select>
                                        </div>
                                    </div>
                                    @endif
                                   <?php 
                                   $user_login = Auth::user()->id;
                                   ?>
                                    <input type="text" hidden value="{{$user_login}}" name = "id_users">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" id="nama_barang" class="form-control"
                                                 name="nama_barang">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" id="jumlah" class="form-control"
                                                 name="jumlah">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" id="foto" class="form-control"
                                                 name="foto">
                                        </div>
                                    </div>
                                   
                                    
                                   
                                    <div class="col-12 d-flex justify-content-start mt-5">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
        @endsection