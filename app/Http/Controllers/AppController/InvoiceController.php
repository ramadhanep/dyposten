<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Checkout;
use App\Models\Cart;
use App\Models\InformasiToko;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->level == "Admin Utama"){
            $d['checkouts'] = Checkout::orderBy("id", "DESC")->get();
            return view("app.invoice.index-au", $d);
        }
        else{
            $d['checkouts'] = Checkout::where("user_id", \Auth::user()->id)->orderBy("id", "DESC")->get();
            return view("app.invoice.index", $d);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(\Auth::user()->level == "Admin Utama"){
            $i = Checkout::where('kode_unik', $id)->first();
            $d['carts'] = Cart::where("status", 0)->where('kode_unik', $i->kode_unik)->orderBy("id", "DESC")->get();
            $d['totalCarts'] = Cart::where("status", 0)->where('kode_unik', $i->kode_unik)->sum('sub_total');
            $d['informasiTokos'] = InformasiToko::first();
            $d['checkouts'] = Checkout::where('kode_unik', $id)->first();
            return view("app.invoice.show-au", $d);
        }
        else{
            $i = Checkout::where('kode_unik', $id)->first();
            $d['carts'] = Cart::where('user_id', \Auth::user()->id)->where("status", 0)->where('kode_unik', $i->kode_unik)->orderBy("id", "DESC")->get();
            $d['totalCarts'] = Cart::where("user_id", \Auth::user()->id)->where("status", 0)->where('kode_unik', $i->kode_unik)->sum('sub_total');
            $d['informasiTokos'] = InformasiToko::first();
            $d['checkouts'] = Checkout::where('kode_unik', $id)->first();
            return view("app.invoice.show", $d);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
