@extends('layout.master')
@section('title','Tambah Data')
@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Tambah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    {{-- content header ends --}}

    {{-- main content --}}
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 offset-3">
                                <label for="nama_toko">Nama Toko</label>
                                <input type="text" value="{{ old('nama_toko') }}" class="form-control @error('nama_toko') is-invalid @enderror" value="{{ old('nama_toko') }}" name="nama_toko" id="nama_toko">
                                @error('nama_toko')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 offset-3">
                                <label for="pemilik_toko">Pemilik</label>
                                <input type="text" value="{{ old('pemilik_toko') }}" class="form-control @error('pemilik_toko') is-invalid @enderror" value="{{ old('pemilik_toko') }}" name="pemilik_toko" id="pemilik_toko">
                                @error('pemilik_toko')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 offset-3 mr-5">
                            <label for="no_izin_usaha">	No Izin usaha</label>
                            <input type="text" name="no_izin_usaha" id="no_izin_usaha" value="{{ old('no_izin_usaha') }}" class="form-control @error('no_izin_usaha') is-invalid @enderror">
                            @error('no_izin_usaha')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 offset-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5" >{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- main content ends --}}
</div>
@endsection