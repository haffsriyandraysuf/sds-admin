<?php

namespace App\Http\Controllers;

use App\Rdct_fundname;
use App\Rdct_fundmanager;
use Illuminate\Http\Request;

class CitifundnamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdct_fundnames = Rdct_fundname::all();
        return view('reksadana.fundname.index', compact('rdct_fundnames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rdct_fundmanagers = Rdct_fundmanager::all();
        return view('reksadana.fundname.create', compact('rdct_fundmanagers'));
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
            'id'            => 'required|min:14|max:16|string',
            'fund_name'  => 'required|max:70|string',
            'fn_code_old'      => 'required|min:4|max:6|string',
            'addr1'       => 'required|max:50|string',
            'addr2'       => 'required|max:50|string',
            'npwp'       => 'required|max:20|string',
        ]);

        Rdct_fundname::create($request->all());
        return redirect('/rdct_fundnames')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rdct_fundname  $rdct_fundname
     * @return \Illuminate\Http\Response
     */
    public function show(Rdct_fundname $rdct_fundname)
    {
        return view('reksadana.fundname.show', compact('rdct_fundname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdct_fundname  $rdct_fundname
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdct_fundname $rdct_fundname)
    {
        return view('reksadana.fundname.edit', compact('rdct_fundname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdct_fundname  $rdct_fundname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdct_fundname $rdct_fundname)
    {
        // validasi saat input data
        $request->validate([
            'id'            => 'required|min:14|max:16|string',
            'fund_name'  => 'required|max:70|string',
            'fn_code_old'      => 'required|min:4|max:6|string',
            'addr1'       => 'required|max:50|string',
            'addr2'       => 'required|max:50|string',
            'npwp'       => 'required|max:20|string',
        ]);

        Rdct_fundname::where('id', $rdct_fundname->id)
            ->update([
                'id' => $request->id,
                'fund_name' => $request->fund_name,
                'fund_name' => $request->fund_name,
                'rdct_fundmanager_id' => $request->rdct_fundmanager_id,
                'fn_code_old' => $request->fn_code_old,
                'addr1' => $request->addr1,
                'addr2' => $request->addr2,
                'addr3' => $request->addr3,
                'addr4' => $request->addr4,
                'npwp' => $request->npwp,
            ]);
        return redirect('/rdct_fundnames')->with('sukses', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdct_fundname  $rdct_fundname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdct_fundname $rdct_fundname)
    {
        Rdct_fundname::destroy($rdct_fundname->id);
        return redirect('/rdct_fundnames')->with('hapus', 'Data berhasil dihapus');
    }
}
