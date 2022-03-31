@extends('master/main')

@section('title', 'tambah_petugas')

@section('active1' , 'active')
@section('page-heading')

<div class="page-heading">
    <h3>Data Petugas</h3>
    
</div>
@endsection

@section('content')

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action= 'tambah_petugas' method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nama_petugas">Nama Lengkap</label>
                                        <input type="text" id="nama_petugas" name="nama_petugas" class="form-control"
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
                                                  <option value="Pria">Pria</option>
                                                  <option value="Wanita">Wanita</option>
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
                                        <label for="level_id">Pilih Level</label>
                                        {{-- <input type="password" id="password" class="form-control"
                                            name="password" placeholder="Password"> --}}
                                            <select name="level_id" id="level_id" class="form-control">
                                                <option>--- Pilih Level  ---</option>
                                                  <option value="1">Admin</option>
                                                  <option value="2">Karyawan</option>
                                                  {{-- <option value="3">Customer</option> --}}
                                              </select>
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