{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div class="panel-body">
                      Check admin view:
                      <a href="{{route('admin.home')}}">Admin Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div class="panel-body">
                      Check admin view:
                      <a href="{{route('admin.home')}}">Admin Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('template.guest')

@section('title')
    Hasilbumiku.com || Home
@endsection

@section('content')
    <div class="content-wrapper "
        <!-- Content Header (Page header) -->
        <div class="content-header">
            
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="">
                        <div class="row bg-dark">
                            <div class="col-6 my-5">
                                <div class="container mx-5">
                                    <h2>
                                        Raih kenikmatan dari rasa Baru
                                    </h2>
                                    <h1 class="text-warning col-4">
                                        Sebuah kunci dari Kesehatan
                                    </h1>
                                    <p class="col-8">
                                        Hasilbumiku.com tempat terbaik untuk mendapatkan Buah dan Sayur terbaik serta membantu mewujudkan Keinginan anda. 
                                    </p>
                                    <a href="{{ route('produk') }}" class="btn btn-outline-light btn-lg">Discover More</a>
                                </div>
                            </div>
                            <div class="col-6 my-5">
                                <img src="{{ asset('dist/img/buah.jpg') }}" alt="" class="w-50 h-100">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <div class="card m-3 p-3" style="width: 18rem;">
                                <img width="100" height="150" class="card-img-top" src="{{ asset('dist/img/sayur.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                <h5 class="card-title">Dapatkan Sayur</h5>
                                <p class="card-text">Dapatkan Sayur segar yang ditawarkan dari seluruh desa</p>
                                <h3></h3>
                                <form action="" method="">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="">
                                    <a href="{{ route('sayur') }}" class="btn btn-primary">Kunjungi Produk Sayur</a>
                                        
                                    </form>
                                </div>
                            </div>

                                <div class="card m-3 p-3" style="width: 18rem;">
                                    <img width="100" height="150" class="card-img-top" src="{{ asset('dist/img/Buahbuah.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">Dapatkan Buah</h5>
                                    <p class="card-text">Dapatkan Buah kualitas terbaik yang ditawarkan dari seluruh desa</p>
                                    <h3></h3>
                                    <form action="" method="">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="">
                                        <a href="{{ route('buah') }}" class="btn btn-primary">Kunjungi Produk Buah</a>
                                            
                                        </form>
                                    </div>
                                </div>

                                <div class="card m-3 p-3" style="width: 18rem;">
                                    <img width="100" height="150" class="card-img-top" src="{{ asset('dist/img/kebon.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">Sewa Kebun</h5>
                                    <p class="card-text">Dapatkan penyewaan daerah yang ditawarkan dari seluruh desa</p>
                                    <h3></h3>
                                    <a href="{{ route('lahan') }}" class="btn btn-primary">Kunjungi Lahan</a>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection