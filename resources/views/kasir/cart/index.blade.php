@extends('template.guest')

@section('title')
    Kasir HasilBumiku.com
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kasir HasilBumiku.com</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kasir</li>
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
                        <div class="card-body">
                            <table class="table table-sm">
                              @if ($itemcart!= null)
                              <thead>
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4">No</th>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4">Harga</th>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4">Produk</th>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4">Qty</th>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4">Subtotal</th>
                                    <th scope="col" class="text-sm font-medium text-black px-6 py-4"></th>
                                </tr>
                            </thead> 
                            <tbody>
                              @foreach($itemcart->detail as $detail)
                              <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ number_format($detail->harga, 2) }}</td>
                              <br/><td>{{ $detail->produk->nama_barang }}</td>
                              <td>
                                  <div class="btn-group" role="group">
                                  <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                                  @method('patch')
                                  @csrf()
                                      <input type="hidden" name="param" value="kurang">
                                      <button class="btn btn-primary btn-sm">
                                      -
                                      </button>
                                  </form>
                                  <button class="btn btn-outline-primary btn-sm" disabled="true">{{ number_format($detail->qty, 2) }} 
                                    @if ($detail->produk->jenis_barang != 'lahan') 
                                      Kg
                                    @else
                                      Thn
                                    @endif</button>
                                  <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                                  @method('patch')
                                  @csrf()
                                      <input type="hidden" name="param" value="tambah">
                                      <button class="btn btn-primary btn-sm">
                                      +
                                      </button>
                                  </form>
                                  </div>
                              </td>
                              <td>{{ number_format($detail->subtotal, 2) }}</td>
                              <td>
                                  <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                                      @csrf
                                      {{ method_field('delete') }}
                                      <button type="submit" class="btn btn-sm btn-danger mb-2">Hapus</button>                    
                                  </form>
                              </td>
                              </tr>
                              @endforeach
                            </tbody> 
                              @endif
                            </table>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                          <div class="card-header">
                            Ringkasan
                          </div>
                            @if ($itemcart!=null)
                            <div class="card-body">
                            <table class="table">
                              <tr>
                                <td>No Invoice</td>
                                <td class="text-right">
                                  {{ $itemcart->no_invoice }}
                                </td>
                              </tr>
                              <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                  {{ number_format($itemcart->subtotal, 2) }}
                                </td>
                              </tr>
                              <tr>
                                <td>Total</td>
                                <td class="text-right">
                                  {{ number_format($itemcart->total, 2) }}
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class="card-footer">
                            <div class="row">
                              <div class="col">
                                <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">
                                  Checkout
                              </a>
                              </div>
                              <div class="col">
                                <form action="{{ url('kosongkan').'/'.$itemcart->id }}" method="POST">
                                  @method('patch')
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
                                </form>
                              </div>
                            </div>
                          </div>
                            @endif
                            {{-- <table class="table">
                              <tr>
                                <td>No Invoice</td>
                                <td class="text-right">
                                  {{ $itemcart->no_invoice }}
                                </td>
                              </tr>
                              <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                  {{ number_format($itemcart->subtotal, 2) }}
                                </td>
                              </tr>
                              <tr>
                                <td>Total</td>
                                <td class="text-right">
                                  {{ number_format($itemcart->total, 2) }}
                                </td>
                              </tr>
                            </table> --}}
                          
                          
                        </div>
                      </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
