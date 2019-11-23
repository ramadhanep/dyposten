@include("layouts.components.head")
<style>
    body{
        background-color: #fff !important;
    }
    .img-print img{
        width: 100px;
    }
</style>
<section class="section">
    <div class="print-padding d-flex flex-column text-left">
        <div class="img-print d-flex justify-content-center mb-4">
            <img src="{{ asset('img_upload/toko/'.$informasiTokos->foto) }}" alt="{{ $informasiTokos->nama }}">
        </div>
        <div class="w-full text-center d-flex justify-content-center flex-column">
            <h1>{{ $informasiTokos->nama }}</h1>
            <p>{!! $informasiTokos->alamat !!}</p>
        </div>
        <div class="text-center mt-3">
            <span class="badge badge-primary">Laporan Produk Masuk</span>
        </div>
        <div class="hr-line"></div>
        <div class="w-full text-left d-flex justify-content-between align-items-center">
            <p>Kode POS : <b>{{ $informasiTokos->kode_pos }}</b></p>
            <p>Kategori : <b>Semua Kategori</b></p>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barcode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
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
                    <td>{!! $res->keterangan !!}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    window.print()
</script>
