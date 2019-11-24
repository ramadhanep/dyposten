<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Produk;
use App\Models\Checkout;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $d['users'] = User::all()->count();
        $d['produks'] = Produk::all()->count();
        $d['produk_kosong'] = Produk::where("stok", 0)->count();
        $d['checkouts'] = Checkout::all()->count();
        return view('home', $d);
    }
}
