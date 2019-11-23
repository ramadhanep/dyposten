<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

use App\Models\Unit;
use App\Models\Currency;
use App\Models\PersentaseKeuntungan;
use App\Models\Ppn;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['produks'] = Produk::orderBy("id", "DESC")->get();

        return view("app.produk.index", $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $d['kategoris'] = Kategori::orderBy("id", "DESC")->get();
        $d['units'] = Unit::orderBy("id", "DESC")->get();
        $d['currencies'] = Currency::orderBy("id", "DESC")->get();
        $d['persentaseKeuntungans'] = PersentaseKeuntungan::orderBy("id", "DESC")->get();
        $d['ppns'] = Ppn::orderBy("id", "DESC")->get();
        return view("app.produk.create", $d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Produk;
    	$barcode = rand(1111111111111111,9999999999999999);
    	$d->barcode = $barcode;
    	$d->kategori_id = $request->kategori_id;
    	$d->currency_id = $request->currency_id;
    	$d->unit_id = $request->unit_id;
    	$d->nama = $request->nama;
    	$d->stok = $request->stok;
    	$d->harga_beli = $request->harga_beli;
    	$d->keterangan = $request->keterangan;
        $d->diskon = $request->diskon;
        $d->laba = $request->laba;
        $d->ppn = $request->ppn;
        if($request->diskon != null){
            $diskon = $request->harga_beli * $request->diskon / '100';
            $minus = $request->harga_beli - $diskon;
            $persen = $minus * ($request->laba + $request->ppn) / '100';
            $d->harga_jual = $persen + $minus;
        }
        else{
            $persen = $request->harga_beli * ($request->laba + $request->ppn) / '100';
            $d->harga_jual = $request->harga_beli + $persen;
        }

    	$d->save();

        return redirect()->route("produk.index")->with("alertStore", $request->input("nama"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = Produk::find($id);
        return response()->json($d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d['kategoris'] = Kategori::orderBy("id", "DESC")->get();
        $d['units'] = Unit::orderBy("id", "DESC")->get();
        $d['currencies'] = Currency::orderBy("id", "DESC")->get();
        $d['persentaseKeuntungans'] = PersentaseKeuntungan::orderBy("id", "DESC")->get();
        $d['ppns'] = Ppn::orderBy("id", "DESC")->get();

        $d['produk'] = Produk::find($id);
        return view("app.produk.edit", $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $d = Produk::find($id);
        $barcode = rand(1111111111111111,9999999999999999);
    	$d->barcode = $barcode;
    	$d->kategori_id = $request->kategori_id;
    	$d->currency_id = $request->currency_id;
    	$d->unit_id = $request->unit_id;
    	$d->nama = $request->nama;
    	$d->stok = $request->stok;
    	$d->harga_beli = $request->harga_beli;
    	$d->keterangan = $request->keterangan;
        $d->diskon = $request->diskon;
        $d->laba = $request->laba;
        $d->ppn = $request->ppn;
        if($request->diskon != null){
            $diskon = $request->harga_beli * $request->diskon / '100';
            $minus = $request->harga_beli - $diskon;
            $persen = $minus * ($request->laba + $request->ppn) / '100';
            $d->harga_jual = $persen + $minus;
        }
        else{
            $persen = $request->harga_beli * ($request->laba + $request->ppn) / '100';
            $d->harga_jual = $request->harga_beli + $persen;
        }

        $d->save();

        return redirect()->route("produk.index")->with("alertUpdate", $request->input("nama"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Produk::find($id);
        $nama = $d->nama;
        $d->delete();

        return redirect()->route("produk.index")->with("alertDestroy", $nama);
    }
}
