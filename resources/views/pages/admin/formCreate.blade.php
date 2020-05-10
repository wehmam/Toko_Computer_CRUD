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
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="no_invoice">No Invoice</label>
                                <input type="text" class="form-control @error('no_invoice') is-invalid @enderror" name="no_invoice" id="no_invoice">
                                @error('no_invoice')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_barang"></label>
                                <input type="text" class="form-control @error('no_invoice') is-invalid @enderror" name="no_invoice" id="no_invoice">
                                @error('no_invoice')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                        <div class="form-group">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- main content ends --}}
</div>
@endsection