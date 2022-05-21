@extends('master/main')

@section('title', 'tambah_petugas')

@section('active1' , 'active')
@section('page-heading')

<div class="page-heading">
    <h3>Data Kategori</h3>
    
</div>
@endsection

@section('content')

@foreach($kategori as $k)
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Kategori</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ url('update_kategori/'. $k->id ) }}" method="POST">
                            @method('put')
                            @csrf
                     
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="{{ $k->gender }}">{{ $k->gender }}</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                 
                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Pemakai</label>
                                                <select name="pemakai" id="pemakai" class="form-control">
                                                    <option value="{{ $k->pemakai}}">{{ $k->pemakai}}</option>
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
                                                        <option value="{{ $k->kat }}">{{ $k->kat }}</option>
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
                                                    <option value="{{ $k->ukuran }}">{{ $k->ukuran }}</option>
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

@endforeach

@endsection