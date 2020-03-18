<?php

namespace App\Http\Controllers;

use App\Waki_price;
use Illuminate\Http\Request;

class WakipricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waki_prices = Waki_price::all();
        return view('waki.wakiprice.index', compact('waki_prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('waki.wakiprice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Waki_price::create($request->all());
        return redirect('/waki_prices')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Waki_price  $waki_price
     * @return \Illuminate\Http\Response
     */
    public function show(Waki_price $waki_price)
    {
        return view('waki.wakiprice.show', compact('waki_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Waki_price  $waki_price
     * @return \Illuminate\Http\Response
     */
    public function edit(Waki_price $waki_price)
    {
        return view('waki.wakiprice.edit', compact('waki_price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waki_price  $waki_price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waki_price $Waki_price)
    {
        Waki_price::where('id', $Waki_price->id)
            ->update([
                'price_material' => $request->price_material,
                'cost_service' => $request->cost_service,
            ]);
        return redirect('/waki_prices')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Waki_price  $waki_price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waki_price $waki_price)
    {
        Waki_price::destroy($waki_price->id);
        return redirect('/waki_prices')->with('hapus', 'Data berhasil dihapus');
    }
}
