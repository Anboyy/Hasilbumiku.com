@extends('template.guest')

@section('title')
    Hasilbumiku.com || Produk
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
                        @foreach ($produk as $product)
                            <div class="card m-3 p-3" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="Card image cap">
                                <div class="card-body">
                                <h2 class="card-title"><strong>{{ $product->nama_barang }}</strong></h2>
                                <p class="card-text"><em>{{ $product->deskripsi }}<br>penjual: {{ $product->penjual }}</em></p>
                                <h6>Stock: {{ $product->quantity }} Kg<br>Rp. {{ $product->harga }}</h6>

                                <form action="{{ route('cartdetail.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="produk_id" value={{$product->id}}>
                                        <button type="submit" class="btn btn-primary" >
                                            @if ($product->jenis_barang == 'lahan')
                                                Sewa Lahan
                                            @else
                                                Tambahkan ke Keranjang
                                            @endif
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

