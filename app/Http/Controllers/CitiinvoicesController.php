<?php

namespace App\Http\Controllers;

use App\Rdct_invoice;
use App\Rdct_price;
use App\Rdct_fundname;
use PDF;
use Illuminate\Http\Request;

class CitiinvoicesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rdct_fundnames = Rdct_fundname::all();
    $rdct_invoices = Rdct_invoice::all();
    $rdct_prices = Rdct_price::all();
    return view('reksadana.invoice.index', compact('rdct_fundnames', 'rdct_invoices', 'rdct_prices'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Rdct_fundname $rdct_fundname)
  {
    $rdct_fundname = Rdct_fundname::find($rdct_fundname->id);
    $rdct_prices = Rdct_price::all()[0];
    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $jumlah = count($bulan);
    return view('reksadana.invoice.create', compact('rdct_fundname', 'rdct_prices', 'bulan', 'jumlah'));
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
    if ($request->total == 100000) {
      $request->price_printing = $request->price_inserting = $request->cost_printing = $request->cost_inserting = 0;
      Rdct_invoice::create([
        'no_invoice' => $invoice,
        'rdct_fundname_id' => $request->rdct_fundname_id,
        'periode' => $request->periode,
        'qty_printing' => $request->qty_printing,
        'qty_inserting' => $request->qty_inserting,
        'price_printing' => $request->price_printing,
        'price_inserting' => $request->price_inserting,
        'cost_printing' => $request->cost_printing,
        'cost_inserting' => $request->cost_inserting,
        'total' => $request->htotal,
        'ppn' => $request->hppn,
        'pph' => $request->hpph,
        'amount' => $request->hamount,
      ]);
    } else {
      Rdct_invoice::create([
        'no_invoice' => $invoice,
        'rdct_fundname_id' => $request->rdct_fundname_id,
        'periode' => $request->periode,
        'qty_printing' => $request->qty_printing,
        'qty_inserting' => $request->qty_inserting,
        'price_printing' => $request->price_printing,
        'price_inserting' => $request->price_inserting,
        'cost_printing' => $request->cost_printing,
        'cost_inserting' => $request->cost_inserting,
        'total' => $request->htotal,
        'ppn' => $request->hppn,
        'pph' => $request->hpph,
        'amount' => $request->hamount,
      ]);
    }
    return redirect('/invoices')->with('sukses', 'Data berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Rdct_invoice  $rdct_invioce
   * @return \Illuminate\Http\Response
   */
  public function show(Rdct_invoice $rdct_invoice)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Rdct_invoice  $rdct_invioce
   * @return \Illuminate\Http\Response
   */
  public function edit(Rdct_invoice $rdct_invoice, Rdct_fundname $rdct_fundname)
  {
    // dd($rdct_invoice
    return view('citibank.reksadana.invoice.edit', compact('rdct_invoice', 'rdct_fundname'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Rdct_invoice  $rdct_invioce
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Rdct_invoice $rdct_invoice)
  {
    Rdct_invoice::where('id', $request->pk)->update(['no_invoice' => $request->value]);
    return response()->json(['sukses' => 'data berhasil diupdate']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Rdct_invoice  $rdct_invioce
   * @return \Illuminate\Http\Response
   */
  public function destroy(Rdct_invoice $rdct_invoice)
  {
    //
  }
  public function print(Rdct_invoice $rdct_invoice, Rdct_fundname $rdct_fundname)
  {
    $rdct_fundname = $rdct_fundname::all();
    $rdct_invoice = $rdct_invoice::find($rdct_invoice->id);
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
    $pdf = PDF::loadView('reksadana.invoice.print', compact('rdct_fundname', 'rdct_invoice', 'date'));
    $filename = $rdct_invoice->no_invoice . ' - ' . $rdct_invoice->nama_file;
    return $pdf->stream("$filename.pdf");
  }
}
