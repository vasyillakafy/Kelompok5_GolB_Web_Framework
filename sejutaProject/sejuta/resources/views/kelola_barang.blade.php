@extends('master/main')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
@endsection
@section('title', 'Kelola Barang')
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

@section('content')
<section class="section">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Permintaan Barang</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Barang diproses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#dikirim" role="tab"
                                aria-controls="dikirim" aria-selected="false">Sedang dikirim</a>
                        </li>
                        <hr>          <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Selesai</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mt-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-xl-12 col-md-12 col-sm-12 mt-5">
                                <div class="row">
                                    <?php
                                    use App\Models\kelola;
                               if($kelola_barang != ""){
                               $kelola_barang1 = kelola::where('id_users', Auth::user()->id)->where('status', 'belum diproses')->get();
                               // return view('kelola_barang', compact('kelola_barang1'));
   }
?>
                                    @foreach ($kelola_barang1 as $k)
                                    
                             
                                    <div class="card ms-4" style="width: 17rem;  margin: 10px, 50px, 10px, 10px">
                                        <img src="{{ asset('img/'. $k->barang->foto )}}" class="card-img-top" alt="...">
                                        <div class="card-body" style="background-color: #f6f7f8;">
                                          <h5 class="card-title">{{  $k->barang->nama_barang}}  </h5>
                                          <p>Permintaan oleh - {{ $k->user->nama }}</p>
                                          <p class="card-text"> Deskripsi : {{ $k->barang->deskripsi }}</p>
                                          <a href="{{ url('detail_kelola/'.$k->id  ,$k->status) }}" class="btn btn-info" style="text-align: center; align-items: center; justify-content: center; justify-items: center; justify-self: center">Detail</i></a>
                                          <!-- <a href="#" class="btn btn-success">Proses</a> -->
                                        </div>
                                      </div>
    
                                      @endforeach
                                     
                                </div>
                               

                            </div>
                          
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-xl-12 col-md-12 col-sm-12 mt-5">
                                <div class="row">
                                    <?php
                                    // use App\Models\kelola;
                               if($kelola_barang != ""){
                               $kelola_barang2 = kelola::where('id_users', Auth::user()->id)->where('status', 'diproses')->get();
                               // return view('kelola_barang', compact('kelola_barang1'));

                              

                                    
   }



?>
                               
                               
                            @foreach ($kelola_barang2 as $k2)
                                    
                             
                            <div class="card ms-4" style="width: 17rem;  margin: 10px, 50px, 10px, 10px">
                                <img src="{{ asset('img/'. $k2->barang->foto )}}" class="card-img-top" alt="...">
                                <div class="card-body" style="background-color: #f6f7f8;">
                                  <h5 class="card-title">{{  $k2->barang->nama_barang}}  </h5>
                                  <p>Permintaan oleh - {{ $k2->user->nama }}</p>
                                  <p class="card-text"> Deskripsi : {{ $k2->barang->deskripsi }}</p>
                                  
                                  <a href="{{ url('detail_kelola/'.$k2->id  ,$k2->status) }}" class="btn btn-info" style="text-align: center; align-items: center; justify-content: center; justify-items: center; justify-self: center">Detail</i></a>
                                 
                                  <!-- <a href="#" class="btn btn-success">Proses</a> -->
                                </div>
                              </div>

                              @endforeach
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-xl-12 col-md-12 col-sm-12 mt-5">
                                <div class="row">

                                    <?php
                                        //  use App\Models\kelola;
                                    if($kelola_barang != ""){
                                    $kelola_barang3 = kelola::where('id_users', Auth::user()->id)->where('status', 'dikirim')->get();
                                    // return view('kelola_barang', compact('kelola_barang1'));

                                  
                                    
        }



?>
                            @foreach ($kelola_barang3 as $k3)
                                    
                             
                            <div class="card ms-4" style="width: 17rem;  margin: 10px, 50px, 10px, 10px">
                                <img src="{{ asset('img/'. $k3->barang->foto )}}" class="card-img-top" alt="...">
                                <div class="card-body" style="background-color: #f6f7f8;">
                                  <h5 class="card-title">{{  $k3->barang->nama_barang}}  </h5>
                                  <p>Permintaan oleh - {{ $k3->user->nama }}</p>
                                  <p class="card-text"> Deskripsi : {{ $k3->barang->deskripsi }}</p>
                                  <a href="{{ url('detail_kelola/'.$k3->id  ,$k3->status) }}" class="btn btn-info" style="text-align: center; align-items: center; justify-content: center; justify-items: center; justify-self: center">Detail</i></a>
                                  <!-- <a href="#" class="btn btn-success">Proses</a> -->
                                </div>
                              </div>

                              @endforeach
                              </div>
                              </div>
                        </div>

                        <?php
                                        //  use App\Models\kelola;
                                    if($kelola_barang != ""){
                                    $kelola_barang4 = kelola::where('id_users', Auth::user()->id)->where('status', 'selesai')->get();
                                    // return view('kelola_barang', compact('kelola_barang1'));
        }



?>
<hr>
                        <div class="tab-pane fade mt-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            @foreach ($kelola_barang4 as $item)
                                
                         
                            <div class="table-responsive">
                                <table class="table table-striped mt-3" id="table1">
                                    <thead>
                                        <tr>
                                            <th >#</th>
                                            <th>Kode Pengiriman</th>
                                            <th>Pemesan</th>
                                            <th >Barang</th>
                                            <th>Foto</th>
                                            <th>Tgl Kirim</th>
                                            <th>Tgl Sampai</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                         ?>
                                         
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->id }} - {{ $item->user->nama }}</td>
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td><img src="{{ asset('img/'. $item->barang->foto )}}" class="card-img-top" alt="..."></td>
                                            <td>{{ $item->tgl_kirim }}</td>
                                            <td>{{ $item->tgl_terima }}</td>
                                            <td>
                                                <img src="{{ asset('img/'. $item->foto_paket )}}" class="card-img-top" alt="...">
                                            </td>
                                            <td>
                                                <a href="{{ url('detail_kelola/'.$item->id  ,$item->status) }}" class="btn btn-warning" style="text-align: center; align-items: center; justify-content: center; justify-items: center; justify-self: center">Detail</i></a>
                                            </td>
                            
                                    </tr>
                                    @endforeach
                                 </tbody>
                              
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

@endsection

@push('scripts')
<script src="{{ asset ('template/dist/assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{ asset ('template/dist/assets/vendors/jquery-datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('template/dist/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset ('template/dist/assets/vendors/fontawesome/all.min.js')}}"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
@endpush




