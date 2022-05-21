@extends('master/main')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
@endsection
@section('title', 'kategori')
@section('active1' , 'active')
@section('page-heading')
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
    

@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ url('tambah_kategori') }}" class="btn btn-primary mb-3">Tambah Data</a>
        </div>
        <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                 @endif
              
              
                <div class="card-content">
                   
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="table1">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Id kategori</th>
                                    <th >Gender</th>
                                    <th>Pemakai</th>
                                    <th>Kategori</th>
                                    <th>Ukuran</th>
                                    {{-- <th>Email</th>
                                    <th>Username</th>
                                    <th>Level User</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                 ?>
                                 
                                  @foreach($kategori as $m)
                                  <tr>
                                    <td scope="row">{{ $no++;  }}</td>
                                    <td>{{ $m->id }}</td>
                                    <td>{{ $m->gender }}</td>
                                    <td>{{ $m->pemakai}}</td>
                                    <td>{{ $m->kat}}</td>
                                    <td>{{ $m->ukuran}}</td>
                                   
                                    <td>
                                      <a href="edit_kategori/{{ $m->id }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                          
                                      <form action="hapus_kategori/{{ $m->id }}" class="d-inline" method="POST"
                                        onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                                        @method('delete')
                                        @csrf
                          
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
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





 {{-- <?php
                                // $no=1;
                                 ?>
                                 
                                  @foreach($kategori as $m)
                                 <tbody>
                                   <tr>
                                     <td scope="row">{{ $no++;  }}</td>
                                     <td>{{ $m->id }}</td>
                                     <td>{{ $m->nama_kategori }}</td>
                                     <td>{{ $m->jk}}</td>
                                     <td>{{ $m->alamat}}</td>
                                     <td>{{ $m->no_telp}}</td>
                                     <td>{{ $m->email}}</td>
                                     <td>{{ $m->username}}</td>
                                     <td>{{ $m->level_id}}</td>
                                     <td>
                                       <a href="edit_kategori/{{ $m->id }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                           
                                       <form action="hapus_kategori/{{ $m->id }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                                         @method('delete')
                                         @csrf
                           
                                         <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                     </form>
                                 </td>
                             </tr> --}}
    


