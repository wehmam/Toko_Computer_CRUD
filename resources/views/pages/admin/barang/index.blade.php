@extends('layout.master')
@section('title','home')
@section('barang','active')
@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang</h1>
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
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
                    @if(session()->has('tambah'))
                      <div class="alert alert-success">{{ session()->get('tambah') }}</div>
                    @elseif(session()->has('edit'))
                      <div class="alert alert-warning">{{ session()->get('edit') }}</div>
                    @elseif(session()->has('hapus'))
                      <div class="alert alert-danger">{{ session()->get('hapus') }}</div>
                    @endif
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No Invoice</th>
                      <th>Nama Barang</th>
                      <th>Jenis</th>
                      <th>Berat Barang</th>
                      <th>Warna</th>
                      <th>Gambar</th>
                      <th colspan="2" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($collection as $item)
                            <tr>
                              <td>{{ $item->no_invoice }}</td>
                              <td>{{ $item->nama_barang }}</td>
                              <td>{{ $item->jenis_barang }}</td>
                              <td>{{ $item->berat_barang }}</td>
                              <td>{{ $item->warna_barang }}</td>
                              <td><img src="{{ asset('storage/gambar/'.$item->gambar_barang) }}" width="150" alt=""></td>
                              <td><a href="{{ route('barang.edit',$item->barang_id,'edit') }}" class="badge badge-success">Edit</a></td>
                              <td>
                                <form action="{{ route('barang.destroy',$item->barang_id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin Ingin menghapus {{ $item->nama_barang }} ?')">Delete</button>
                                </form>
                              </td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    </section>
    {{-- main content ends --}}
</div>
@endsection