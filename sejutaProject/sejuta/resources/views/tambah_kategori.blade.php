@extends('master/main')

@section('title', 'tambah_petugas')

@section('active1' , 'active')
@section('page-heading')

<div class="page-heading">
    <h3 style="margin: 0px 0px 2px 20px">Data Kategori</h3>

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
                        <form class="form form-vertical" action="tambah_kategori" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option>--- Pilih Jenis Kelamin ---</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                 
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Pemakai</label>
                                                <select name="pemakai" id="pemakai" class="form-control">
                                                    <option>--- Pilih Pemakai---</option>
                                                    <option value="Balita">Balita</option>
                                                    <option value="Anak-Anak">Anak-Anak</option>
                                                    <option value="Remaja">Remaja</option>
                                                    <option value="Dewasa">Dewasa</option>
                                                 
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label for="last-name-column"> Kategori</label>
                                                {{-- <input type="text" id="last-name-column" class="form-control"
                                                    placeholder="Last Name" name="lname-column"> --}}
                                                    <select name="kat" id="kat" class="form-control">
                                                        <option>--- Pilih Jenis Kategori ---</option>
                                                        <option value="Kemeja">Kemeja</option>
                                                        <option value="Kaos">Kaos</option>
                                                        <option value="Celana">Celana</option>
                                                        <option value="Jaket">Jaket</option>
                                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Ukuran</label>
                                                <select name="ukuran" id="ukuran" class="form-control">
                                                    <option>--- Pilih Ukuran---</option>
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    </select>
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