@extends('master/main')

@section('title', 'tambah_admin')

@section('active4' , 'active')
@section('page-heading')

<div class="page-heading">
    <h3>Data Admin</h3>
    
</div>
@endsection

@section('content')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                
                <div class="card-content">
                    <div class="card-body">
                        
                        <form class="form" action= 'tambah-admin' method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama_petugas">Nama Lengkap</label>
                                        <input type="text" id="nama_petugas" name="nama" class="form-control"
                                            placeholder="Nama Lengkap" name="fname-column">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Jenis Kelamin</label>
                                        {{-- <input type="text" id="last-name-column" class="form-control"
                                            placeholder="Last Name" name="lname-column"> --}}
                                            <select name="jk" id="jk" class="form-control">
                                                <option>--- Pilih Jenis Kelamin ---</option>
                                                  <option value="Laki-Laki">Laki-Laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                              </select> 
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" id="alamat" class="form-control"
                                            placeholder="Alamat" name="alamat">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input type="number" id="no_telp" class="form-control"
                                            name="no_telp" placeholder="No Telp">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Email</label>
                                        <input type="email" id="email" class="form-control"
                                            name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" class="form-control"
                                            name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="form-control"
                                            name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        @endsection