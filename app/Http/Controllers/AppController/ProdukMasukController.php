<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\InformasiToko;

class ProdukMasukController extends Controller
{
    public function index(){
        $d['produks'] = Produk::orderBy("id", "DESC")->get();

        return view("app.produkMasuk.index", $d);
    }
    public function print(){
        $d['produks'] = Produk::orderBy("id", "DESC")->get();
        $d['informasiTokos'] = InformasiToko::first();

        return view("app.produkMasuk.print", $d);
    }
}
