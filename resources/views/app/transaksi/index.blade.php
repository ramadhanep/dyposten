@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Transaksi Penjualan</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
        <div class="breadcrumb-item">Transaksi Penjualan</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card card-primary">
                <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h4>Pilih Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <select id="produkSelect" class="form-control select2" name="produk_id" required>
                                <option value="">&mdash;</option>
                                @foreach($produks as $res)
                                <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Form Nama Produk harus diisi!
                            </div>
                        </div>
                        <div id="trDetailProduk" class="tr-detail-produk">
                            <p>Stok Tersisa : <b id="tr_stok">0</b></p>
                            <p>Harga : <b id="tr_harga">IDR 101011</b></p>
                            <span><i>Sudah termasuk PPN & Diskon toko</i></span>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" class="form-control" value="1" name="jumlah" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="submit-btn">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card card-primary">
                <div class="card-header d-flex justify-content-between">
                    <h4>Keranjang</h4>
                    @if($totalCarts != 0)
                    <a class="btn btn-warning btn-sm" href="{{ route('transaksiClean') }}">Bersihkan Keranjang</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th colspan="2">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $res)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                        $res->produk->barcode, 'C39')}}" height="20" width="100">
                                        <span class="text-barcode">{{ $res->produk->barcode }}</span>
                                    </div>
                                </td>
                                <td>{{ $res->produk->nama }}</td>
                                <td>{{ $res->jumlah }}</td>
                                <td>IDR {{ number_format($res->sub_total,2,',','.') }}</td>
                                <td>
                                    <a href="#" data-uri="{{ route('transaksi.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-right">
                        <p class="h5">Total Harga : <b>IDR {{ number_format($totalCarts,2,',','.') }}</b></p>
                    </div>
                    <hr>
                </div>
                <div class="card-footer text-right">
                    @if($totalCarts != 0)
                    <a href="{{ route('checkout.index') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-shopping-cart"></i> Checkout</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@include("layouts.components.toastSession")
@endsection
@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/izitoast/js/iziToast.min.js') }}"></script>

    <script src="{{ asset('stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
@section("scriptSpesific")
    <script src="{{ asset('stisla/js/page/modules-datatables.js') }}"></script>
@endsection
@section("scriptCustom")
    @include("layouts.components.toastSession")
    <script>
        $('#trDetailProduk').hide()
        $('#produkSelect').change(function(){
            let _id = $(this).val()
            if(_id != ""){
                $.ajax({
                    url: "{{ url('produk') }}/"+_id,
                    method: "GET",
                    success:function(data){
                        $('#tr_stok').html(data.stok)
                        $('#tr_harga').html("IDR "+data.harga_jual)
                        $('#trDetailProduk').slideDown("slow")
                    }
                })
            }
            else{
                $('#trDetailProduk').slideUp("slow")
            }
        })
    </script>
@endsection
