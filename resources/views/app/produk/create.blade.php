@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Produk</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Inventory</a></div>
        <div class="breadcrumb-item"><a href="#">Produk</a></div>
        <div class="breadcrumb-item">Create</div>
    </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
            @csrf
            <div class="col-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Tambah Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="nama" required="">
                                    <div class="invalid-feedback">
                                        Form Nama Produk harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control selectric" name="kategori_id" required>
                                        <option value="">&mdash;</option>
                                        @foreach($kategoris as $res)
                                        <option value="{{ $res->id }}">{{ $res->kategori }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Kategori harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" class="form-control" name="stok" required="">
                                    <div class="invalid-feedback">
                                        Form Stok harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control selectric" name="currency_id" required>
                                        <option value="">&mdash;</option>
                                        @foreach($currencies as $res)
                                        <option value="{{ $res->id }}">{{ $res->currency }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Currency harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control selectric" name="unit_id" required>
                                        <option value="">&mdash;</option>
                                        @foreach($units as $res)
                                        <option value="{{ $res->id }}">{{ $res->unit }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Form Unit harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" class="form-control" name="harga_beli" required="">
                                    <div class="invalid-feedback">
                                        Form Harga Beli harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <select class="form-control selectric" name="laba" required>
                                                <option value="">Persentase Laba</option>
                                                @foreach($persentaseKeuntungans as $res)
                                                <option value="{{ $res->persentase_keuntungan }}">{{ $res->persentase_keuntungan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control selectric" name="ppn" required>
                                                <option value="">Stok Minimum &mdash; PPN</option>
                                                @foreach($ppns as $res)
                                                <option value="{{ $res->ppn }}">{{ $res->stok_minimum }} &mdash; {{ $res->ppn }}%</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Form Harga Jual harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-group">
                                    <label>Diskon Produk</label>
                                    <input type="number" class="form-control" name="diskon">
                                    <div class="invalid-feedback">
                                        Form Diskon Produk harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="summernote-simple" name="keterangan" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Form Keterangan harus diisi!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                            <label class="custom-control-label" for="customCheck1">Setuju, dan sudah memeriksa data dengan benar.</label>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" id="submit-btn">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('stisla/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
@section("scriptCustom")
    <script>
        $('#categoryLink').addClass('active');
        $('.select2').select2()
    </script>
    <script src="{{ asset('stisla/js/page/features-post-create.js') }}"></script>
@endsection
