@extends('template.admin')

@section('title')
    Data Mahasiswa PTI
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mahasiswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('editbarang.create') }}" class="btn btn-primary">Tambah Barang</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th># No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jenis Barang</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Quantity</th>
                                        <th>Nama Penjual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $barangs)
                                        <tr>
                                            <td>{{ $barangs->id }}</td>
                                            <td>{{ $barangs->nama_barang }}</td>
                                            <td>{{ $barangs->harga }}</td>
                                            <td>{{ $barangs->jenis_barang }}</td>
                                            <td><img width="100" height="100" src="{{ asset($barangs->image) }}" alt=""></td>
                                            <td>{{ $barangs->deskripsi }}</td>
                                            <td>{{ $barangs->quantity }} Kg</td>
                                            <td>{{ $barangs->penjual }}</td>
                                            <td>
                                                <div class="d-f">
                                                    <a href="{{ route('editbarang.edit', $barangs->id) }}" class="btn btn-secondary">Edit</a>
                                                    <form action="{{ route('editbarang.destroy', $barangs->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger">
                                                          Hapus
                                                        </button>                    
                                                    </form>
                                                    {{-- <button type="button" class="btn btn-secondary">Edit</button> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
