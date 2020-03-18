<?php

namespace App\Http\Controllers;

use App\Bhi_price;
use Illuminate\Http\Request;

class BhipricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bhi_prices = Bhi_price::all();
        return view('bhi.bhiprice.index', compact('bhi_prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        $sub_produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "WAY" => "Waybill",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "WELL" => "Welcome",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        return view('bhi.bhiprice.create', compact('produk', 'sub_produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->produk == 'REKSADANA') {
            Bhi_price::create([
                'produk' => $request->produk,
                'sub_produk' => $request->sub_produk,
                'material_printing' => $request->material_printing,
                'cost_printing' => $request->cost_printing,
                'material_inserting' => $request->material_inserting,
                'cost_inserting' => $request->cost_inserting,
                'biaya_kertas' => $request->biaya_kertas,
                'biaya_amplop' => $request->biaya_amplop,
            ]);
        } elseif ($request->sub_produk == 'WAYBILL') {
            $request->biaya_kertas = $request->biaya_amplop = $request->material_inserting = $request->cost_inserting = 0;
            Bhi_price::create([
                'produk' => $request->produk,
                'sub_produk' => $request->sub_produk,
                'material_printing' => $request->material_printing,
                'cost_printing' => $request->cost_printing,
                'material_inserting' => $request->material_inserting,
                'cost_inserting' => $request->cost_inserting,
                'biaya_kertas' => $request->biaya_kertas,
                'biaya_amplop' => $request->biaya_amplop,
            ]);
        } else {
            $request->biaya_kertas = $request->biaya_amplop = 0;
            Bhi_price::create([
                'produk' => $request->produk,
                'sub_produk' => $request->sub_produk,
                'material_printing' => $request->material_printing,
                'cost_printing' => $request->cost_printing,
                'material_inserting' => $request->material_inserting,
                'cost_inserting' => $request->cost_inserting,
                'biaya_kertas' => $request->biaya_kertas,
                'biaya_amplop' => $request->biaya_amplop,
            ]);
        }
        return redirect('/bhi_prices')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bhi_price $bhi_price)
    {
        $produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        $sub_produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "WAY" => "Waybill",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "WELL" => "Welcome",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        return view('bhi.bhiprice.show', compact('bhi_price', 'produk', 'sub_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bhi_price $bhi_price)
    {
        $produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        $sub_produk = array(
            "ADV" => "Advice",
            "BILL" => "Billing",
            "WAY" => "Waybill",
            "COLL" => "Collection",
            "CHSR" => "Cheeser",
            "WELL" => "Welcome",
            "RDN" => "Reksadana",
            "LTR" => "Letter",

        );
        return view('bhi.bhiprice.edit', compact('bhi_price', 'produk', 'sub_produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bhi_price $bhi_price)
    {
        if ($request->produk == 'REKSADANA') {
            Bhi_price::where('id', $bhi_price->id)
                ->update([
                    'produk' => $request->produk,
                    'sub_produk' => $request->sub_produk,
                    'material_printing' => $request->material_printing,
                    'cost_printing' => $request->cost_printing,
                    'material_inserting' => $request->material_inserting,
                    'cost_inserting' => $request->cost_inserting,
                    'biaya_kertas' => $request->biaya_kertas,
                    'biaya_amplop' => $request->biaya_amplop,
                ]);
        } else {
            $request->biaya_kertas = $request->biaya_amplop = 0;
            Bhi_price::where('id', $bhi_price->id)
                ->update([
                    'produk' => $request->produk,
                    'sub_produk' => $request->sub_produk,
                    'material_printing' => $request->material_printing,
                    'cost_printing' => $request->cost_printing,
                    'material_inserting' => $request->material_inserting,
                    'cost_inserting' => $request->cost_inserting,
                    'biaya_kertas' => $request->biaya_kertas,
                    'biaya_amplop' => $request->biaya_amplop,
                ]);
        }
        return redirect('/bhi_prices')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bhi_price $bhi_price)
    {
        Bhi_price::destroy($bhi_price->id);
        return redirect('/bhi_prices');
    }
}
