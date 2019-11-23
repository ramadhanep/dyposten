<?php

namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ppn;

class PPNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['ppns'] = Ppn::orderBy("id", "DESC")->get();

        return view("app.ppn.index", $d);
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
        $d = new Ppn;
        $d->stok_minimum = $request->input("stok_minimum");
        $d->ppn = $request->input("ppn");

        $d->save();

        return redirect()->route("ppn.index")->with("alertStore", $request->input("ppn"));
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
        $d = Ppn::find($id);
        $d->stok_minimum = $request->input("stok_minimum");
        $d->ppn = $request->input("ppn");

        $d->save();

        return redirect()->route("ppn.index")->with("alertUpdate", $request->input("ppn"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Ppn::find($id);
        $ppn = $d->ppn;
        $d->delete();

        return redirect()->route("ppn.index")->with("alertDestroy", $ppn);
    }
}
