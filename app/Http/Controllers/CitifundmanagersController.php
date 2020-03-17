<?php

namespace App\Http\Controllers;

use App\Rdct_fundmanager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitifundmanagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdct_fundmanagers = Rdct_fundmanager::all();
        return view('reksadana.fundmanager.index', compact('rdct_fundmanagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reksadana.fundmanager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi saat input data
        $request->validate([
            'id'            => 'required|min:4|string',
            'fund_manager'  => 'required|max:50|string',
            'currency'      => 'required|max:3|string',
            'paid_by'       => 'required|max:10|string',
        ]);

        // query/menyimpan data ke database
        Rdct_fundmanager::create($request->all());
        return redirect('/rdct_fundmanagers')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rdct_fundmanager  $rdct_fundmanager
     * @return \Illuminate\Http\Response
     */
    public function show(Rdct_fundmanager $rdct_fundmanager)
    {
        return view('reksadana.fundmanager.show', compact('rdct_fundmanager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdct_fundmanager  $rdct_fundmanager
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdct_fundmanager $rdct_fundmanager)
    {
        return view('reksadana.fundmanager.edit', compact('rdct_fundmanager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdct_fundmanager  $rdct_fundmanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdct_fundmanager $rdct_fundmanager)
    {
        // validasi saat input data
        $request->validate([
            'id'            => 'required|min:4|string',
            'fund_manager'  => 'required|max:50|string',
            'currency'      => 'required|max:3|string',
            'paid_by'       => 'required|max:10|string',
        ]);

        // menyimpan data yang sudah diubah ke database
        Rdct_fundmanager::where('id', $rdct_fundmanager->id)
            ->update([
                'id' => $request->id,
                'fund_manager' => $request->fund_manager,
                'currency' => $request->currency,
                'paid_by' => $request->paid_by,
            ]);
        return redirect('/rdct_fundmanagers')->with('sukses', 'Data berhasil diubah');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdct_fundmanager  $rdct_fundmanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdct_fundmanager $rdct_fundmanager)
    {
        Rdct_fundmanager::destroy($rdct_fundmanager->id);
        return redirect('/rdct_fundmanagers')->with('hapus', 'Data berhasil dihapus');;;
    }
}
