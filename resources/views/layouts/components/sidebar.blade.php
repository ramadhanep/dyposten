    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Dyposten</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            @if(Auth::user()->level == "Admin Utama")
                <li class="menu-header">Manajemen Toko</li>
                <li><a class="nav-link" href="{{ route('informasiToko.index') }}"><i class="fas fa-store-alt"></i> <span>Informasi Toko</span></a></li>
                <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
                <li class="menu-header">Konfigurasi</li>
                <li><a class="nav-link" href="{{ route('currencies.index') }}"><i class="fas fa-dollar-sign"></i> <span>Currencies</span></a></li>
                <li><a class="nav-link" href="{{ route('ppn.index') }}"><i class="fas fa-money-bill-alt"></i> <span>PPN</span></a></li>
                <li><a class="nav-link" href="{{ route('units.index') }}"><i class="fas fa-building"></i> <span>Units</span></a></li>
                <li><a class="nav-link" href="{{ route('persentaseKeuntungan.index') }}"><i class="fas fa-percent"></i> <span>Persentase Keuntungan</span></a></li>
                <li><a class="nav-link" href="{{ route('bahan.index') }}"><i class="fas fa-bookmark"></i> <span>Bahan</span></a></li>
                <li><a class="nav-link" href="{{ route('kategoriProduk.index') }}"><i class="fas fa-cube"></i> <span>Kategori Produk</span></a></li>
                <li class="menu-header">Inventory</li>
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-dolly-flatbed"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('produk.index') }}">Semua Produk</a></li>
                    <li><a class="nav-link" href="{{ route('produkMasuk') }}">Laporan Produk Masuk</a></li>
                    <li><a class="nav-link" href="{{ route('produkKosong.index') }}">Stok Kosong</a></li>
                </ul>
                </li>
                <li class="menu-header">Transaksi</li>
                <li><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-shopping-cart"></i> <span>Transaksi</span></a></li>
                <li><a class="nav-link" href="{{ route('invoice.index') }}"><i class="fas fa-history"></i> <span>Riwayat Transaksi</span></a></li>
            @endif
            @if(Auth::user()->level == "Admin Gudang")
                <li class="menu-header">Konfigurasi</li>
                <li><a class="nav-link" href="{{ route('currencies.index') }}"><i class="fas fa-dollar-sign"></i> <span>Currencies</span></a></li>
                <li><a class="nav-link" href="{{ route('ppn.index') }}"><i class="fas fa-money-bill-alt"></i> <span>PPN</span></a></li>
                <li><a class="nav-link" href="{{ route('units.index') }}"><i class="fas fa-building"></i> <span>Units</span></a></li>
                <li><a class="nav-link" href="{{ route('persentaseKeuntungan.index') }}"><i class="fas fa-percent"></i> <span>Persentase Keuntungan</span></a></li>
                <li><a class="nav-link" href="{{ route('bahan.index') }}"><i class="fas fa-bookmark"></i> <span>Bahan</span></a></li>
                <li><a class="nav-link" href="{{ route('kategoriProduk.index') }}"><i class="fas fa-cube"></i> <span>Kategori Produk</span></a></li>
                <li class="menu-header">Inventory</li>
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-dolly-flatbed"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('produk.index') }}">Semua Produk</a></li>
                    <li><a class="nav-link" href="{{ route('produkMasuk') }}">Laporan Produk Masuk</a></li>
                    <li><a class="nav-link" href="{{ route('produkKosong.index') }}">Stok Kosong</a></li>
                </ul>
                </li>
            @endif
            @if(Auth::user()->level == "Kasir")
                <li class="menu-header">Transaksi</li>
                <li><a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-shopping-cart"></i> <span>Transaksi</span></a></li>
                <li><a class="nav-link" href="{{ route('invoice.index') }}"><i class="fas fa-history"></i> <span>Riwayat Transaksi</span></a></li>
            @endif
          </ul>

          <div class="mt-2 mb-4 p-3 hide-sidebar-mini">
          </div>
        </aside>
      </div>
