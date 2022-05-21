@extends('master/main')

@section('title', 'tambah_petugas')

@section('active3' , 'active')
@section('page-heading')
<h3 style="margin: 0px 0px 2px 20px">Kelola Barang</h3>

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
    

@endsection



<?php

use Illuminate\Support\Facades\Auth;

?>


@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            @foreach($kelola_barang as $b)
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-4">
                            <h4 class="card-title">Detail Barang</h4>

                        </div>
                        <div class="col-md-5">
                        

                            <?php
                            $status = $b->status;
                            $tgl_kirim1 =date('Y-m-d');
                            $tgl_terima1 = date('Y-m-d');
                       

                            if ($status == 'belum diproses') {
                                $tgl_kirim ="";
                                $tgl_terima ="";
                                $status = "diproses";
                            } elseif ($status == "diproses") {
                                $tgl_kirim = $tgl_kirim1;
                                $tgl_terima ="";
                                $status = "dikirim";
                            } elseif ($status == "dikirim") {
                                $tgl_kirim ="";
                                $tgl_terima = $tgl_terima1;
                                $status = "selesai";
                            }elseif ($status == "selesai") {
                                $tgl_kirim = "";
                                $tgl_terima = $tgl_terima1;
                                $status = "selesai";
                            } else {
                                $status = "";
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <form action="{{ url('update/'.$b->id ) }}" class="d-inline" method="POST">
                                @method('patch')
                                @csrf

                 
                                   
                                    {{-- <button type="submit"
                                    class="btn btn-info me-1 mb-1">Kirim Pesanan</button> --}}
                                  
                 
                                <!-- <input type="text"  name="id_users" hidden>
                                <input type="text"  name="id_user" hidden>

                                <input type="text"  name="id_user" hidden> -->
                              
                                
                                <input type="text" value="{{$status}}" name="status" hidden>

                                @if($status == "selesai"){
                                    <input type="date" value="" name="tgl_kirim" hidden>
                                    <input type="date" value="" name="tgl_terima" hidden>
                                    <button class="btn btn-success" hidden><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @elseif($status == "diproses"){
                                    <input type="date" value="{{$tgl_kirim }}" name="tgl_kirim" hidden>
                                    <input type="date" value="{{$tgl_terima }}" name="tgl_terima" hidden>
                                    <button class="btn btn-success"><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @elseif($status == "dikirim"){
                                    <input type="date" value="{{$tgl_kirim }}" name="tgl_kirim" hidden>
                                    <input type="date" value="{{$tgl_terima }}" name="tgl_terima" hidden>
                                    <button class="btn btn-success" ><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @elseif($status == "belum diproses"){
                                    <input type="date" value="{{$tgl_kirim }}" name="tgl_kirim" hidden>
                                    <input type="date" value="{{$tgl_terima }}" name="tgl_terima" hidden>
                                    <button class="btn btn-success" ><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @else{
                                    <button class="btn btn-success" ><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @endif
                                
                                {{-- @if($status == "belum diproses"){
                                    <button class="btn btn-success"><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @if($status == "diproses"){
                                    <button class="btn btn-success"><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                }
                                @if($status == "dikirim"){
                                    <button class="btn btn-success"><i class="bi bi-edit"></i>Konfirmasi Barang</button>
                                } --}}


                                
                            </form>
                        </div>

                    </div>

                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="width: 12rem;  margin: 10px, 50px, 10px, 10px">
                                    <img src="{{ asset('img/'. $b->barang->foto )}}" class=" " alt="...">

                                </div>
                            </div>
                            <div class="col-md-5">
                                <!-- <div class="card ms-4" style="width: 12rem;  margin: 10px, 50px, 10px, 10px"> -->
                                <div>
                                    <h5 class="card-title">Kode Pengiriman : {{ $b->id}}</h5>
                                    <p>Permintaan oleh - {{ $b->user->nama }} <br>
                                        Nama Barang : {{ $b->barang->nama_barang }} <br>
                                        Jumlah Barang : {{ $b->barang->jumlah }} <br>

                                        Deskripsi : {{ $b->barang->deskripsi }} <br>
                                        Alamat Tujuan : {{ $b->user->alamat }} <br>

                                    </p>
                                    <h5 class="card-title">Status Barang : {{ $b->status}} </h5>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card " style="width: 12rem;  margin: 10px, 50px, 10px, 10px">
                                    <img src="{{ asset('img/'. $b->user->foto )}}" class="img-circle" alt="...">
                                </div>

                            </div>

                        </div>

                        @endforeach
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection