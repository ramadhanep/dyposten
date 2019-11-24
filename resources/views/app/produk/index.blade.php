@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Inventory</a></div>
        <div class="breadcrumb-item"><a href="#">Produk</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a href="{{ route('produk.create') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-dolly-flatbed"></i> Tambah Data</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                $res->barcode, 'C39')}}" height="20" width="100">
                                <span class="text-barcode">{{ $res->barcode }}</span>
                            </div>
                        </td>
                        <td>{{ $res->nama }}</td>
                        <td>{{ $res->kategori->kategori }}</td>
                        <td>{{ $res->stok }}</td>
                        <td>{{ $res->currency->currency }} {{ number_format($res->harga_jual,2,',','.') }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $res->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="#" data-uri="{{ route('produk.destroy', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
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
