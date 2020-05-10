@extends('layout.master')
@section('title','Edit Data')
@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Edit Data</h1>
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
                    <form action="{{ route('barang.update',$barang->barang_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="no_invoice">No Invoice</label>
                                <input type="text" class="form-control @error('no_invoice') is-invalid @enderror" value="{{ $barang->no_invoice }}" name="no_invoice" id="no_invoice">
                                @error('no_invoice')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $barang->nama_barang }}" name="nama_barang" id="nama_barang">
                                @error('nama_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenis_barang">Jenis Barang</label>
                                    <div class="form-group">
                                        <select id="jenis_barang" class="form-control" value="{{ $barang->jenis_barang }}" name="jenis_barang">

                                        @foreach ($jenis as $item)
                                            <option value="{{ $item }}"  {{ $barang->jenis_barang == $item ? 'selected' : '' }}>{{ $item }}</option>
                                        @endforeach
                                        </select>
                                        @error('jenis_barang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="berat_barang">Berat Barang</label>
                                <input type="text" class="form-control @error('berat_barang') is-invalid @enderror" value="{{ $barang->berat_barang }}" name="berat_barang" id="berat_barang">
                                @error('berat_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="warna_barang">Warna</label>
                                <input type="text" class="form-control mt-3 @error('warna_barang') is-invalid @enderror" value="{{ $barang->warna_barang }}" name="warna_barang" id="warna_barang">
                                @error('warna_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="gambar_barang"  class="mx-2">Gambar</label>
                            <div class="form-group col-md-5 mt-5">
                                <input type="file" name="gambar_barang" value="{{ $barang->gambar_barang }}" class="form-control-input @error('gambar_barang') is-invalid @enderror">
                                @error('gambar_barang')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- main content ends --}}
</div>
@endsection