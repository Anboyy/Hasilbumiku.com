@extends('template.admin')

@section('title')
    HasilBumiku.com || Tambah Barang
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Mahasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit Barang</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="w-screen m-9">
    
                <div class="card-body" >
                    <form method="POST" action="{{ route('editbarang.store') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-6">
                            <label for="nama_barang" class="">Nama Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukan nama barang">
                        </div>
                        <div class="form-group">
                            <label for="nameInput">Jenis Barang</label>
                            <select class="form-control" name="jenis_barang">
                                <option>Jenis Barang</option>
                                <option value="sayur-sayuran">Sayur-sayuran</option>
                                <option value="buah-buahan">Buah-buahan</option>
                                <option value="lahan">Lahan</option>
                            </select>
                            @error('jenis_barang')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah Barang</label>
                            <input type="number" id="quanity" name="quantity" class="form-control" placeholder="Jumlah Barang">
                        </div>   
                        <div class="mb-6">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga Barang</label>
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga Barang">
                        </div>
                        <div class="mb-6">
                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi barang">
                        </div>
                        <div class="mb-6">
                            <label for="penjual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penjual</label>
                            <input type="text" id="quanity" name="penjual" class="form-control" placeholder="Nama Penjual">
                        </div>   
                        <div class="mb-6">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload Image</label>
                            <input class="form-control" placeholder="Upload Image" aria-describedby="file_input_help" id="image" name="image" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>
                        <div class="mt3"><img src="" id="output" width="500"></div>
                
                        <div class="mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-black rounded-lg">
                                Store
                            </button>
                        </div>
                    </form>
                  </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection