@extends('template.guest')

@section('title')
    Kategori Lahan
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <p> Filter:
                    <a href="{{ route('sayur') }}">Sayur</a> | 
                    <a href="{{ route('buah') }}">Buah</a> | 
                    <a href="{{ route('lahan') }}">Tanah</a> |
                </p>
                <div class="d-flex">
                    @foreach ($barang as $product)
                        <div class="card m-3 p-3" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_barang }}</h5>
                            <p class="card-text">{{ $product->deskripsi }}</p>
                            <h3>Rp. {{ $product->harga }}</h3>
                            <form action="{{ route('cartdetail.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value={{$product->id}}>
                                    <button type="submit" class="btn btn-primary" >
                                        Sewa Lahan
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection