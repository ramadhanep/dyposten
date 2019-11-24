@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        @if(Auth::user()->level == "Admin Utama")
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                        {{ $users }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Produk</h4>
                        </div>
                        <div class="card-body">
                        {{ $produks }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Produk Kosong</h4>
                        </div>
                        <div class="card-body">
                        {{ $produk_kosong }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Transaksi</h4>
                        </div>
                        <div class="card-body">
                        {{ $checkouts }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->level == "Admin Gudang")
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Produk</h4>
                        </div>
                        <div class="card-body">
                        {{ $produks }}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Produk Kosong</h4>
                        </div>
                        <div class="card-body">
                        {{ $produk_kosong }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->level == "Kasir")
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Transaksi</h4>
                        </div>
                        <div class="card-body">
                        {{ $checkouts }}
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('stisla/img/unsplash/andre-benz-1214056-unsplash.jpg');">
                        <div class="hero-inner">
                        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <p class="lead">Hak Akses {{ Auth::user()->level }} telah diberikan kepada akun Anda!. Selamat Menggunakan Aplikasi!</p>
                        <div class="mt-4">
                            <a href="{{ route('profile') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Profil Akun</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("scriptLibraies")
    <script src="{{ asset('stisla/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/chart.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/izitoast/js/iziToast.min.js') }}"></script>
@endsection

@section("scriptSpesific")
@endsection
@section("scriptCustom")
    @if(session()->has('success'))
        <script>
            iziToast.info({
                title: '{{ Auth::user()->level }} Hak Akses Anda!',
                message: "Selamat Menggunakan Aplikasi",
                position: 'topRight'
            });
            iziToast.success({
                title: 'Selamat Datang di Dyposten!',
                message: "{{ Auth::user()->name }}",
                position: 'topRight'
            });
        </script>
    @endif
@endsection
