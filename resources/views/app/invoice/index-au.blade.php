@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Riwayat Transaksi</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
        <div class="breadcrumb-item"><a href="#">Riwayat Transaksi</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode Transaksi</th>
                        <th>Total Pembelian</th>
                        <th>Metode Pembayaran</th>
                        <th>Nama Kasir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checkouts as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                $res->kode_unik, 'C39')}}" height="20" width="100">
                                <span class="text-barcode">{{ $res->kode_unik }}</span>
                            </div>
                        </td>
                        <td>IDR {{ number_format($res->total,2,',','.') }}</td>
                        <td>
                            <div class="badge badge-primary">
                                {{ $res->metode_pembayaran }}
                            </div>
                        </td>
                        <td>{{ $res->user->name }}</td>
                        <td>
                            <a href="{{ route('invoice.show', $res->kode_unik) }}" class="btn btn-success btn-sm">Selengkapnya</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
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
@endsection
@section("scriptSpesific")
    <script src="{{ asset('stisla/js/page/modules-datatables.js') }}"></script>
@endsection
@section("scriptCustom")
    @include("layouts.components.toastSession")
@endsection
