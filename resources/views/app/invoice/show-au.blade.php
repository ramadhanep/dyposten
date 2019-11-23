@extends('layouts.app')

@section('content')
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-print, .invoice-print * {
            visibility: visible;
        }
        .invoice-print {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Riwayat Transaksi &mdash; Penjualan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
            <div class="breadcrumb-item">Riwayat Transaksi</div>
            <div class="breadcrumb-item">Show</div>
        </div>
    </div>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="invoice-title d-flex justify-content-between">
                        <h2>{{ $informasiTokos->nama }}</h2>
                        <div class="img-invoice">
                            <img src="{{ asset('img_upload/toko/'.$informasiTokos->foto) }}" alt="{{ $informasiTokos->nama }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Kasir :</strong><br>
                                {{ Auth::user()->name }}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Tanggal:</strong><br>
                                @include('_____FUNCTION.tglIndo')
                                @php
                                    $d = $checkouts->created_at;
                                    $t = $d->format('Y-m-d');
                                @endphp
                                {{ hari_ini(date('D', strtotime($t))) }}, {{ tgl_indo($t) }}<br><br>
                            </address>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="section-title">Ringkasan Pembelian</div>
                    <p class="section-lead">Semua barang yang dibeli tidak dapat dihapus di sini.</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
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
                                <td>IDR {{ number_format($res->produk->harga_jual,2,',','.') }}</td>
                                <td>{{ $res->jumlah }}</td>
                                <td>IDR {{ number_format($res->sub_total,2,',','.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                        <div class="section-title">Metode Pembayaran</div>
                        <p class="section-lead">Metode pembayaran yang kami sediakan adalah untuk memudahkan Anda membayar faktur.</p>
                        <div class="images">
                            <img class="metode_pembayaran_img" src="{{ asset('img/metode_pembayaran/cash.jpg') }}" alt="cash">
                        </div>
                        <br>
                        <span><i>Harga sudah termasuk PPN dan diskon toko kami.</i></span>
                        </div>
                        <div class="col-lg-4 text-right">
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Total</div>
                            <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($totalCarts,2,',','.') }}</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Bayar</div>
                            <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($checkouts->bayar,2,',','.') }}</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                            <div class="invoice-detail-name">Kembalian</div>
                            <div class="invoice-detail-value invoice-detail-value-lg">IDR {{ number_format($checkouts->kembalian,2,',','.') }}</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
            <button id="printInvoice" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
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
        $('#printInvoice').click(function(){
            window.print()
        })
    </script>
@endsection
