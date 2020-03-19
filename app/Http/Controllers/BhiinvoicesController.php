<?php

namespace App\Http\Controllers;

use App\Bhi_invoice;
use App\Bhi_price;
use App\Bhi_detail;
use PDF;
use Illuminate\Http\Request;

class BhiinvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bhi_invoices = Bhi_invoice::all();
        $bhi_prices = Bhi_price::all();
        return view('bhi.bhiinvoice.index', compact('bhi_invoices', 'bhi_prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengambil data produk
        // mengurutkan produk sesuai abjad
        $bhi_price = Bhi_price::orderBy('produk', 'asc')->get();

        // generate produk
        $bhi_price = $bhi_price->groupBy(function ($list) {
            return $list->produk;
        })->all();
        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $jumlah = count($bulan);
        return view('bhi.bhiinvoice.create', compact('bhi_price', 'bulan', 'jumlah'));
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
        $bhi_invoices = array(
            'no_invoice' => $invoice,
            'periode' => $request->periode,
            'produk' => $request->produk,
            'total' => $request->htotal,
            'ppn' => $request->hppn,
            'pph' => $request->hpph,
            'amount' => $request->hamount
        );
        $bhi_invoice_id = Bhi_invoice::create($bhi_invoices)->id;
        if (count($request->sub_produk) > 0) {
            foreach ($request->sub_produk as $sub => $v) {
                $data = array(
                    'bhi_invoice_id' => $bhi_invoice_id,
                    'sub_produk' => $request->sub_produk[$sub],
                    'qty_print' => $request->qty_printing[$sub],
                    'qty_insert' => $request->qty_inserting[$sub],
                    'material_printing' => $request->price_printing[$sub],
                    'cost_printing' => $request->cost_printing[$sub],
                    'material_inserting' => $request->price_inserting[$sub],
                    'cost_inserting' => $request->cost_inserting[$sub],
                    'biaya_kertas' => $request->biaya_kertas,
                    'biaya_amplop' => $request->biaya_amplop,
                );
                Bhi_detail::insert($data);
            }
        }
        return redirect('bhi_invoices')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bhi_invoice  $bhi_invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Bhi_invoice $bhi_invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bhi_invoice  $bhi_invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Bhi_invoice $bhi_invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bhi_invoice  $bhi_invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bhi_invoice $bhi_invoice)
    {
        Bhi_invoice::where('id', $request->pk)->update(['no_invoice' => $request->value]);
        return response()->json(['success' => 'data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bhi_invoice  $bhi_invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bhi_invoice $bhi_invoice)
    {
        Bhi_invoice::destroy($bhi_invoice->id);
        return redirect('/bhi_invoices');
    }

    public function getproduk($id)
    {
        $bhi_price = Bhi_price::where('produk', $id)->get();
        return view('bhi.bhiinvoice.getproduk', compact('bhi_price'));
    }

    public function print(Bhi_invoice $bhi_invoice)
    {
        $bhi_invoice = $bhi_invoice::find($bhi_invoice->id);
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
        $pdf = PDF::loadView('bhi.bhiinvoice.print', compact('bhi_invoice', 'date'));
        $filename = $bhi_invoice->no_invoice . ' - ' . $bhi_invoice->produk;
        return $pdf->stream("$filename.pdf");
    }
}
