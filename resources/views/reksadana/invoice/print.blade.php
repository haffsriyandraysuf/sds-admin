<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      padding: 0;
    }

    #judul {
      margin-left: 80px;
      width: 230px;
      height: 30px;
      line-height: 30px;
      border: 3px solid black;
      text-align: center;
      background: #bfbfbf;
    }

    .isi-judul {
      margin: 0;
      padding: 0;
      font-size: 16px;
      font-weight: bold;
      letter-spacing: 12px;
      text-transform: uppercase;
    }

    #header-kiri table td{
      line-height: 10px;
      font-size: 10px;
    }
    .tebal{
      font-weight: bold;
    }
    #footer table td{
      line-height: 10px;
      font-size: 10px;
    }
    #content table td{
      line-height: 9px;
      font-size: 10px;
    }
    #content thead td{
      background: #bfbfbf;
      height: 15px;
      text-align: center;
      font-weight: bold;
    }
    #content table tbody td{
      line-height: 13px;
      font-size: 10px;
      border-bottom:none;
      border-top:none;
    }
    #content tbody td.cost{
      text-align: right;
    }
    #content tbody td.qty{
      text-align: center;
    }
    #content tbody td.amount{
      height: 27px;
      border-top:1px solid black;
      background: #bfbfbf;
    }
  </style>
</head>
<body>
  <div id="judul">
    <p class="isi-judul"> invoice </p>
  </div>
  <br>
  <div id="header-kiri">
    <table width=100% cellspacing="0">
      <tr>
        <td class="tebal" width="20px">TO</td>
        <td class="tebal" width="10px">:</td>
        <td class="tebal" width="500px">{{ $rdct_invoice->rdct_fundname->fund_name }}</td>
        <td style="width: 30px;">No.</td>
        <td style="width: 15px;">:</td>
        <td>{{ $rdct_invoice->no_invoice }}</td>
      </tr>
      <tr>
        <td rowspan="4" colspan="2"></td>
        <td>{{ $rdct_invoice->rdct_fundname->addr1 }}</td>
      </tr>
      <tr>
        <td>{{ $rdct_invoice->rdct_fundname->addr2 }}</td>
        <td style="width: 15px;">Date</td>
        <td style="width: 15px;">:</td>
        <td>{{ $date }}</td>
      </tr>
      <tr>
        <td>{{ $rdct_invoice->rdct_fundname->addr3 }}</td>
      </tr>
      <tr>
        <td>{{ $rdct_invoice->rdct_fundname->addr4 }}</td>
      </tr>
      <tr>
        <td  style="height: 10px;"><!--kosong--></td>
      </tr>
      <tr>
        <td class="tebal">NPWP</td>
        <td class="tebal">:</td>
        <td class="tebal">{{ $rdct_invoice->rdct_fundname->npwp }}</td>
      </tr>
      <tr>
        <td  style="height: 10px;"><!--kosong--></td>
      </tr>
    </table>
  </div>
  <div id="content">
    <table width=100% cellspacing="0" border="1">
      <thead>
        <tr>
          <td rowspan="2" width="5%">NO.</td>
          <td rowspan="2" width="65%">D E S C R I P T I O N</td>
          <td width="10%" style="border-bottom:none;">QTY</td>
          <td width="10%" style="border-bottom:none;">UNIT PRICE</td>
          <td width="10%" style="border-bottom:none;">AMOUNT</td>
          </tr>
          <tr>
          <td style="border-top:none;">(PAGES)</td>
          <td style="border-top:none;">(Rp.)</td>
          <td style="border-top:none;">(Rp.)</td>
          </tr>
      </thead>
      @if ( $rdct_invoice->total <= 100000 )
        <tbody>
          <tr>
            <td rowspan="13" valign="top" style="text-align: center;">1</td>
            <td>Payment of <span class="tebal">Material</span> Printing & Inserting Citibank's  Statement (IDR) </td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td class="tebal">* Periode :  {{ $rdct_invoice->periode }} 2019</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="padding: 0 0 0 10px;">{{ ucwords(strtolower($rdct_invoice->rdct_fundname->fund_name)) }} ({{ $rdct_invoice->rdct_fundname->fn_code_old }} - {{ $rdct_invoice->rdct_fundname->id }})</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>Printing</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Daily</td>
            <td class="qty">{{ $rdct_invoice->qty_printing }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Monthly</td>
            <td class="qty" style="border-bottom:1px solid black">{{ $rdct_invoice->qty_inserting }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="text-align:right">TOTAL</td>
            <td class="qty tebal">{{ $rdct_invoice->qty_printing+$rdct_invoice->qty_inserting }}</td>
            <td class="cost"></td>
            <td class="cost"></td>
          </tr>
          <tr>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>Inserting</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Daily</td>
            <td class="qty">{{ $rdct_invoice->qty_printing }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Monthly</td>
            <td class="qty" style="border-bottom:1px solid black">{{ $rdct_invoice->qty_inserting }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="text-align:right">TOTAL</td>
            <td class="qty tebal">{{ $rdct_invoice->qty_printing+$rdct_invoice->qty_inserting }}</td>
            <td class="cost tebal">90,000</td>
            <td class="cost tebal">90,000</td>
          </tr>
          <tr>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td rowspan="10" valign="top" style="text-align: center;">2</td>
            <td>Payment of Service Printing & Inserting Citibank's Statement - <span class="tebal">Cost Production</span> (IDR)</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Printing</td>
            <td class="qty tebal">{{ $rdct_invoice->qty_printing+$rdct_invoice->qty_inserting }}</td>
            <td class="cost"></td>
            <td class="cost"></td>
          </tr>
          <tr>
            <td>- Inserting</td>
            <td class="qty tebal">{{ $rdct_invoice->qty_printing+$rdct_invoice->qty_inserting }} </td>
            <td class="cost tebal">10,000</td>
            <td class="cost tebal">10,000</td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td colspan="3" style="border-top:1px solid black"></td>
            <td style="border-top:1px solid black" class="tebal">T O T A L</td>
            <td style="border-top:1px solid black;" class="cost tebal">{{ number_format($rdct_invoice->total) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="tebal">PPN 10%</td>
            <td class="cost tebal">{{ number_format($rdct_invoice->ppn) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="tebal">PPH 23</td>
            <td class="cost tebal">({{ number_format($rdct_invoice->pph) }})</td>
          </tr>
          <tr>
            <td class="cost amount tebal" colspan="4"><strong>TOTAL AMOUNT DUE (Rp)</strong></td>
            <td class="cost amount tebal"><strong>{{ number_format($rdct_invoice->amount) }}</strong></td>
          </tr>
        </tbody>
      @else
        <tbody>
          <tr>
            <td rowspan="13" valign="top" style="text-align: center;">1</td>
            <td>Payment of <span class="tebal">Material</span> Printing & Inserting Citibank's  Statement (IDR) </td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td class="tebal">* Periode :  {{ $rdct_invoice->periode }} 2019</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="padding: 0 0 0 10px;">{{ ucwords(strtolower($rdct_invoice->rdct_fundname->fund_name)) }} ({{ $rdct_invoice->rdct_fundname->fn_code_old }} - {{ $rdct_invoice->rdct_fundname->id }})</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>Printing</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Daily</td>
            <td class="qty">{{ number_format($rdct_invoice->qty_printing) }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Monthly</td>
            <td class="qty" style="border-bottom:1px solid black">{{ number_format($rdct_invoice->qty_inserting) }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="text-align:right">TOTAL</td>
            <td class="qty tebal">{{ number_format($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) }}</td>
            <td class="cost tebal">{{ $rdct_invoice->price_printing }}</td>
            <td class="cost tebal">{{ number_format(($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) * $rdct_invoice->price_printing) }}</td>
          </tr>
          <tr>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>Inserting</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Daily</td>
            <td class="qty">{{ $rdct_invoice->qty_printing }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Monthly</td>
            <td class="qty" style="border-bottom:1px solid black">{{ $rdct_invoice->qty_inserting }}</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="text-align:right">TOTAL</td>
            <td class="qty tebal">{{ number_format($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) }}</td>
            <td class="cost tebal">{{ $rdct_invoice->price_inserting }}</td>
            <td class="cost tebal">{{ number_format(($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) * $rdct_invoice->price_inserting ) }}</td>
          </tr>
          <tr>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td rowspan="10" valign="top" style="text-align: center;">2</td>
            <td>Payment of Service Printing & Inserting Citibank's Statement - <span class="tebal">Cost Production</span> (IDR)</td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td>- Printing</td>
            <td class="qty tebal">{{ number_format($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) }}</td>
            <td class="cost tebal">{{ $rdct_invoice->cost_printing }}</td>
            <td class="cost tebal">{{ number_format(($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) * $rdct_invoice->cost_printing ) }}</td>
          </tr>
          <tr>
            <td>- Inserting</td>
            <td class="qty tebal">{{ number_format($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) }}</td>
            <td class="cost tebal">{{ $rdct_invoice->cost_inserting }}</td>
            <td class="cost tebal">{{ number_format(($rdct_invoice->qty_printing+$rdct_invoice->qty_inserting) * $rdct_invoice->cost_inserting ) }}</td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td style="height: 10px;"><!--kosong--></td>
            <td style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
            <td  style="height: 10px;"><!--kosong--></td>
          </tr>
          <tr>
            <td colspan="3" style="border-top:1px solid black"></td>
            <td style="border-top:1px solid black" class="cost tebal">T O T A L</td>
            <td style="border-top:1px solid black;" class="cost tebal">{{ number_format($rdct_invoice->total) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="cost tebal">PPN 10%</td>
            <td class="cost tebal">{{ number_format($rdct_invoice->ppn) }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="cost tebal">PPH 23</td>
            <td class="cost tebal">({{ number_format($rdct_invoice->pph) }})</td>
          </tr>
          <tr>
            <td class="cost amount" colspan="4"><strong>TOTAL AMOUNT DUE (Rp)</strong></td>
            <td class="cost amount"><strong>{{ number_format($rdct_invoice->amount) }}</strong></td>
          </tr>
        </tbody>
      @endif
    </table>
  </div><br>
  <div id="footer">
    <table width=100%>
      <tr>
        <td class="tebal" width="20px">Note</td>
        <td class="tebal" width="10px">:</td>
        <td colspan="6" width="10px"></td>
        <td class="tebal" >PT. Startek Data Sistim</td>
      </tr>
      <tr>
          <td style="height: 10px;"><!--kosong--></td>
          <td style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
        </tr>
        <tr>
          <td style="height: 10px;"><!--kosong--></td>
          <td style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
        </tr>
        <tr>
          <td style="height: 10px;"><!--kosong--></td>
          <td style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
          <td  style="height: 10px;"><!--kosong--></td>
        </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td class="tebal" >Please transfer to</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td>Please transfer to</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td>CITIBANK</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td>Jl. Jend. Sudirman Kav 54-55</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td>Jakarta</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td>A/N. PT. Startek Data Sistim</td>
      </tr>
      <tr>
        <td width="10px"></td>
        <td width="10px"></td>
        <td colspan="6">A/C. No. : 3000174157 (Rp.)</td>
        <td class="tebal" >Hendro Tjokro</td>
      </tr>
    </table>
  </div>
</body>
</html>
