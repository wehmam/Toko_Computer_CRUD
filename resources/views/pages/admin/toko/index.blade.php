@extends('layout.master')
@section('title','home')
@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Toko</h1>
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
                    <a href="{{ route('toko.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
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
                      <th>Nama Toko</th>
                      <th>Pemilik</th>
                      <th>No Izin Usaha</th>
                      <th>Alamat</th>
                      <th colspan="2" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($collection as $item)
                            <tr>
                              <td>{{ $item->nama_toko }}</td>
                              <td>{{ $item->pemilik_toko }}</td>
                              <td>{{ $item->no_izin_usaha }}</td>
                              <td>{{ $item->alamat }}</td>
                              <td><a href="{{ route('toko.edit',$item->id,'edit') }}" class="badge badge-success">Edit</a></td>
                              <td>
                                <form action="{{ route('barang.destroy',$item->id) }}" method="POST">
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