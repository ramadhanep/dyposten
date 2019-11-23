<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use App\Models\PersentaseKeuntungan;
use Illuminate\Http\Request;

class PersentaseKeuntunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['persentaseKeuntungans'] = PersentaseKeuntungan::orderBy("id", "DESC")->get();

        return view("app.persentaseKeuntungan.index", $d);
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
        $d = new PersentaseKeuntungan;
        $d->persentase_keuntungan = $request->input("persentase_keuntungan");

        $d->save();

        return redirect()->route("persentaseKeuntungan.index")->with("alertStore", $request->input("persentase_keuntungan"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
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
        $d = PersentaseKeuntungan::find($id);
        $d->persentase_keuntungan = $request->input("persentase_keuntungan");

        $d->save();

        return redirect()->route("persentaseKeuntungan.index")->with("alertUpdate", $request->input("persentase_keuntungan"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = PersentaseKeuntungan::find($id);
        $pk = $d->persentase_keuntungan;
        $d->delete();

        return redirect()->route("persentaseKeuntungan.index")->with("alertDestroy", $pk);
    }
}
