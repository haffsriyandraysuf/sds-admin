<?php

namespace App\Http\Controllers;

use App\Rdct_price;
use Illuminate\Http\Request;

class CitipricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdct_prices = Rdct_price::all();
        return view('reksadana.price.index', compact('rdct_prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reksadana.price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'material_inserting'    => 'required',
            'material_printing'     => 'required',
            'cost_inserting'        => 'required',
            'cost_printing'         => 'required',
        ]);

        Rdct_price::create($request->all());
        return redirect('/rdct_prices')->with('sukses', 'Data berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rdct_price  $rdct_price
     * @return \Illuminate\Http\Response
     */
    public function show(Rdct_price $rdct_price)
    {
        return view('reksadana.price.show', compact('rdct_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdct_price  $rdct_price
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdct_price $rdct_price)
    {
        return view('reksadana.price.edit', compact('rdct_price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdct_price  $rdct_price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdct_price $rdct_price)
    {
        $request->validate([
            'material_inserting'    => 'required',
            'material_printing'     => 'required',
            'cost_inserting'        => 'required',
            'cost_printing'         => 'required',
        ]);

        Rdct_price::where('id', $rdct_price->id)
            ->update([
                'material_printing' => $request->material_printing,
                'material_inserting' => $request->material_inserting,
                'cost_printing' => $request->cost_printing,
                'cost_inserting' => $request->cost_inserting,
            ]);
        return redirect('/rdct_prices')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdct_price  $rdct_price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdct_price $rdct_price)
    {
        Rdct_price::destroy($rdct_price->id);
        return redirect('/rdct_prices')->with('hapus', 'Data berhasil dihapus');;
    }
}
