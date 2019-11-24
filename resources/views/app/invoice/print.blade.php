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
            <span class="badge badge-primary">Laporan Riwayat Transaksi</span>
        </div>
        <div class="hr-line"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barcode Transaksi</th>
                    <th>Total Pembelian</th>
                    <th>Metode Pembayaran</th>
                    <th>Nama Kasir</th>
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
