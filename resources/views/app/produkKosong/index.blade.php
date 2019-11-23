@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Produk Kosong (Stok Habis)</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Inventory</a></div>
        <div class="breadcrumb-item"><a href="#">Produk Kosong</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <a target="blank" href="{{ route('printProdukKosong') }}" class="btn btn-flat btn-icon icon-left btn-primary"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
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
                        <td>
                            <button __nama="{{ $res->nama }}" __action="{{ route('produkKosong.update', $res->id) }}" class="edit btn btn-success btn-sm">Tambah Stok</button>
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

    <button id="openFormCreate" data-toggle="modal" data-target="#modalCreate"></button>
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog confirm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                    &nbsp;&nbsp;<span id="namaProduk" class="badge badge-secondary"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" method="POST" action="" class="needs-validation" novalidate="">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <input type="text" class="form-control" name="stok" value="0" required="" placeholder="Stok">
                        <div class="invalid-feedback">
                            Form Stok harus diisi!
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
    <script>
        $('.edit').click(function(){
            let __nama = $(this).attr("__nama")
            let __action = $(this).attr("__action")

            $('#formCreate').attr("action", __action)
            $('#namaProduk').html(__nama)
            $('#openFormCreate').click()
        })
    </script>
@endsection
