<?php

namespace App\Http\Controllers;

use App\Waki_invoice;
use App\Waki_price;
use PDF;
use Illuminate\Http\Request;

class WakiinvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waki_invoices = Waki_invoice::all();
        return view('waki.wakiinvoice.index', compact('waki_invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = array(
            "Citibank" => "Citibank",
            "Danamon"  => "Danamon",
            "HSBC"     => "HSBC",
        );
        $waki_prices = Waki_price::all()[0];
        return view('waki.wakiinvoice.create', compact('bank', 'waki_prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bulan  = date('n');
        $tahun  = date('y');
        switch ($bulan) {
            case 1:
                $bulan = 'I';
                break;
            case 2:
                $bulan = 'II';
                break;
            case 3:
                $bulan = 'III';
                break;
            case 4:
                $bulan = 'IV';
                break;
            case 5:
                $bulan = 'V';
                break;
            case 6:
                $bulan = 'VI';
                break;
            case 7:
                $bulan = 'VII';
                break;
            case 8:
                $bulan = 'VIII';
                break;
            case 9:
                $bulan = 'IX';
                break;
            case 10:
                $bulan = 'X';
                break;
            case 11:
                $bulan = 'XI';
                break;
            case 12:
                $bulan = 'XII';
                break;
            default:
                $bulan = '0';
                break;
        }
        $invoice = $request->no_invoice . "/SDS/PB/" . $bulan . "/" . $tahun;
        $date1 = date("Y-m-d", strtotime($request->tProses));
        $date2 = date("Y-m-d", strtotime($request->tTerima));
        Waki_invoice::create([
            'no_invoice' => $invoice,
            'bank' => $request->bank,
            'nama_file' => $request->nama_file,
            'qty_printing' => $request->qty_printing,
            'price_material' => $request->price_material,
            'cost_service' => $request->cost_service,
            'total' => $request->htotal,
            'ppn' => $request->hppn,
            'amount' => $request->hamount,
            'tProses' => $date1,
            'tTerima' => $date2,
        ]);
        return redirect('/waki_invoices')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Waki_invoice  $waki_invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Waki_invoice $waki_invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Waki_invoice  $waki_invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Waki_invoice $waki_invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waki_invoice  $waki_invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waki_invoice $waki_invoice)
    {
        Waki_invoice::where('id', $request->pk)->update(['no_invoice' => $request->value]);
        return response()->json(['success' => 'data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Waki_invoice  $waki_invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waki_invoice $waki_invoice)
    {
        Waki_invoice::destroy($waki_invoice->id);
        return redirect('/waki_invoices');
    }

    public function print(Waki_invoice $waki_invoice)
    {
        $waki_invoice = $waki_invoice::find($waki_invoice->id);
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $date = date('d') . ' ' . $bulan[date('m')] . ' ' . date('Y');
        $tProses = date('d', strtotime($waki_invoice->tProses)) . ' ' . $bulan[date('m', strtotime($waki_invoice->tProses))] . ' ' . date('Y', strtotime($waki_invoice->tProses));
        $tTerima = date('d', strtotime($waki_invoice->tTerima)) . ' ' . $bulan[date('m', strtotime($waki_invoice->tTerima))] . ' ' . date('Y', strtotime($waki_invoice->tTerima));

        $pdf = PDF::loadView('waki.wakiinvoice.print', compact('waki_invoice', 'date', 'tProses', 'tTerima'));
        $filename = $waki_invoice->no_invoice . ' - ' . $waki_invoice->nama_file . ' - ' . $waki_invoice->bank;
        return $pdf->stream("$filename.pdf");
    }
}
