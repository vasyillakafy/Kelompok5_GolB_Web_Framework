@extends('master/main')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
@endsection
@section('title', 'Petugas')
@section('active1' , 'active')
@section('page-heading')
<div class="page-heading">
    <h3>Data Petugas</h3>
</div>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ url('tambah_petugas') }}" class="btn btn-primary mb-3">Tambah Data</a>
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
                                    <th >Id Petugas</th>
                                    <th >Nama Petugas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Level User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                 ?>
                                 
                                  @foreach($petugas as $m)
                                  <tr>
                                    <td scope="row">{{ $no++;  }}</td>
                                    <td>{{ $m->id }}</td>
                                    <td>{{ $m->nama_petugas }}</td>
                                    <td>{{ $m->jk}}</td>
                                    <td>{{ $m->alamat}}</td>
                                    <td>{{ $m->no_telp}}</td>
                                    <td>{{ $m->email}}</td>
                                    <td>{{ $m->username}}</td>
                                    <td>{{ $m->level_id}}</td>
                                    <td>
                                      <a href="edit_petugas/{{ $m->id }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                          
                                      <form action="hapus_petugas/{{ $m->id }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
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
                                 
                                  @foreach($petugas as $m)
                                 <tbody>
                                   <tr>
                                     <td scope="row">{{ $no++;  }}</td>
                                     <td>{{ $m->id }}</td>
                                     <td>{{ $m->nama_petugas }}</td>
                                     <td>{{ $m->jk}}</td>
                                     <td>{{ $m->alamat}}</td>
                                     <td>{{ $m->no_telp}}</td>
                                     <td>{{ $m->email}}</td>
                                     <td>{{ $m->username}}</td>
                                     <td>{{ $m->level_id}}</td>
                                     <td>
                                       <a href="edit_petugas/{{ $m->id }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                           
                                       <form action="hapus_petugas/{{ $m->id }}" class="d-inline" method="POST" onsubmit="return confirm('Apakah yakin ingin menghapus data?')">
                                         @method('delete')
                                         @csrf
                           
                                         <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                     </form>
                                 </td>
                             </tr> --}}
    


