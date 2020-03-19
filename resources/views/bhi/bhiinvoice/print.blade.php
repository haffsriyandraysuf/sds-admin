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

        #header-kiri table td {
            line-height: 10px;
            font-size: 10px;
        }

        .tebal {
            font-weight: bold;
        }

        #footer table td {
            line-height: 10px;
            font-size: 10px;
        }

        #content table td {
            line-height: 9px;
            font-size: 10px;
        }

        #content thead td {
            background: #bfbfbf;
            height: 15px;
            text-align: center;
            font-weight: bold;
        }

        #content table tbody td {
            line-height: 13px;
            font-size: 10px;
            border-bottom: none;
            border-top: none;
        }

        #content tbody td.cost {
            text-align: right;
        }

        #content tbody td.qty {
            text-align: center;
        }

        #content tbody td.amount {
            height: 27px;
            border-top: 1px solid black;
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
                <td class="tebal" width="500px">PT. Bank HSBC Indonesia</td>
                <td style="width: 30px;">No.</td>
                <td style="width: 15px;">:</td>
                <td>{{ $bhi_invoice->no_invoice }}</td>
            </tr>
            <tr>
                <td rowspan="4" colspan="2"></td>
                <td>World Trade Center 1 Lt.8-9</td>
            </tr>
            <tr>
                <td>Jl. Jend Sudirman 29-31</td>
                <td style="width: 15px;">Date</td>
                <td style="width: 15px;">:</td>
                <td>{{ $date }}</td>
            </tr>
            <tr>
                <td>Karet Setiabudi - Jakarta Selatan</td>
            </tr>
            <tr>
                <td>DKI Jakarta</td>
                <td colspan="3">Order No. DO9189315</td>
            </tr>
            <tr>
                <td style="height: 10px;"></td>
            </tr>
            <tr>
                <td class="tebal">Attn</td>
                <td class="tebal">:</td>
                @if ($bhi_invoice->produk == 'ADVICE')
                <td class="tebal">Ibu Hilda Zuryanti</td>                                    
                @elseif ($bhi_invoice->produk == 'REKSADANA')
                <td class="tebal">Ibu Lenna Akmal</td>
                @elseif ($bhi_invoice->produk == 'LETTER')
                <td class="tebal">Bapak Afrialdi Rasman</td>
                @elseif ($bhi_invoice->produk == 'BILLING' OR $bhi_invoice->produk == 'COLLECTION' OR $bhi_invoice->produk == 'CHEESER')
                <td class="tebal">Ibu Maria Irene</td>
                @endif
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                @if ($bhi_invoice->produk == 'LETTER')
                <td style="height: 10px;" class="tebal">Ibu Yani Maryani</td>
                @endif
            </tr>
            <tr>
                <td style="height: 10px;"></td>
            </tr>
        </table>
    </div>
    <div id="content">
        <table width=100% cellspacing="0" border="1">
            <thead>
                <tr>
                    <td rowspan="2" width="5%">NO.</td>
                    <td rowspan="2" width="60%">D E S C R I P T I O N</td>
                    <td width="11%" style="border-bottom:none;">QTY</td>
                    <td width="11%" style="border-bottom:none;">UNIT PRICE</td>
                    <td width="13%" style="border-bottom:none;">AMOUNT</td>
                </tr>
                <tr>
                    <td style="border-top:none;">(PAGES)</td>
                    <td style="border-top:none;">(Rp.)</td>
                    <td style="border-top:none;">(Rp.)</td>
                </tr>
            </thead>
            <tbody>
                @if ($bhi_invoice->produk == 'REKSADANA' OR $bhi_invoice->produk == 'LETTER')
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @endif
                <tr>
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                        <td rowspan="6" valign="top" style="text-align: center;">1.</td>
                    @elseif($bhi_invoice->produk == 'REKSADANA')
                        <td rowspan="8" valign="top" style="text-align: center;">1.</td>
                    @elseif($bhi_invoice->produk == 'LETTER')
                        <td rowspan="6" valign="top" style="text-align: center;">1.</td>
                    @else
                        <td rowspan="7" valign="top" style="text-align: center;">1.</td>
                    @endif
                    @if ($bhi_invoice->produk == 'REKSADANA')
                        <td style="padding-left: 6px">
                                Biaya  printing dan Inserting untuk proyek Reksadana
                        </td>
                    @elseif($bhi_invoice->produk == 'LETTER')
                    <td style="padding-left: 6px">
                        Biaya Pencetakan dan Pengamplopan Letter  " BestBill & Resi "
                    </td>
                    @else
                    <td style="padding-left: 6px">
                        Payment of Material Printing Hongkong Bank's Statement
                    </td>
                    @endif
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td class="tebal" style="padding-left: 6px">
                        * Periode : {{ $bhi_invoice->periode }} 2019
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION' OR $bhi_invoice->produk == 'REKSADANA' OR $bhi_invoice->produk == 'LETTER')
                <tr>
                    <td class="tebal" style="height: 10px; padding-left: 6px;">
                        {{ ucwords(strtolower($bhi_invoice->produk)) }}
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @else
                <tr>
                    <td class="tebal" style="height: 10px; padding-left: 6px;">
                        Card Center
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @endif
                @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                    <tr>
                        <td style="height: 10px;">- Statement</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    @elseif ($bhi_invoice->produk == 'REKSADANA')
                    <tr>        
                        <td>- Biaya Printing </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    <tr>        
                        <td>- Biaya Inserting </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->material_inserting) }}
                        </td>
                    </tr>
                    <tr>        
                        <td>- Biaya Amplop </td>
                        <td class="cost tebal" style="height: 10px;">
                            144,431
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->biaya_amplop,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format(144431*$bhi_invoice->bhi_detail[$i]->biaya_amplop) }}
                        </td>
                    </tr>
                    <tr>        
                        <td>- Biaya kertas A4 </td>
                        <td class="cost tebal" style="height: 10px;">
                            156,372
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->biaya_kertas,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format(156372*$bhi_invoice->bhi_detail[$i]->biaya_kertas) }}
                        </td>
                    </tr>
                    @elseif ($bhi_invoice->produk == 'BILLING' OR $bhi_invoice->produk == 'CHEESER')
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    @else
                    <tr>        
                        <td>- Biaya Printing </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    <tr>        
                        <td>- Biaya Inserting </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->material_inserting) }}
                        </td>
                    </tr>
                    @endif
                @endfor
                {{-- @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                    <tr>
                        <td style="height: 10px;">- Statement</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    @else
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_printing,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->material_printing) }}
                        </td>
                    </tr>
                    @endif
                @endfor --}}
                {{-- ENDIF BILLING OR CHEESER --}}
                @if ($bhi_invoice->produk == 'REKSADANA' OR $bhi_invoice->produk == 'LETTER')
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @else
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @endif
                <tr>
                    {{-- IF NOT BILLING/CHEESER ROWSPAN 2 --}}
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                        <td rowspan="4" valign="top" style="text-align: center;">2.</td>
                    @else
                        <td rowspan="5" valign="top" style="text-align: center;">2.</td>
                    @endif
                    @if ($bhi_invoice->produk == 'REKSADANA')
                    <td style="padding-left: 6px;">
                        Biaya jasa  printing dan Inserting untuk proyek Reksadana
                    </td>
                    @elseif($bhi_invoice->produk == 'LETTER')
                    <td style="padding-left: 6px;">
                        Biaya Jasa Pencetakan dan Pengamplopan Letter  " BestBill & Resi "
                    </td>
                    @else
                    <td style="padding-left: 6px;">
                        Payment of Service printing Hongkong Bank's Statement - <strong>Cost Production</strong>
                    </td>
                    @endif
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                {{-- IF BILING OR CHEESER --}}
                @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                @if ($bhi_invoice->produk == 'REKSADANA' OR $bhi_invoice->produk == 'LETTER')
                <tr>        
                    <td>- Biaya Printing</td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->cost_printing,2) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->cost_printing) }}
                    </td>
                </tr>
                <tr>        
                    <td>- Biaya Inserting</td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->cost_inserting,2) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->cost_inserting) }}
                    </td>
                </tr>
                @else
                <tr>        
                    <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->cost_printing,2) }}
                    </td>
                    <td class="cost tebal" style="height: 10px;">
                        {{ number_format($bhi_invoice->bhi_detail[$i]->qty_print*$bhi_invoice->bhi_detail[$i]->cost_printing) }}
                    </td>
                </tr>
                @endif
                @endfor
                {{-- ENDIF BILING OR CHEESER --}}
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    {{-- <td style="height: 10px;"></td> --}}
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    {{-- <td style="height: 10px;"></td> --}}
                </tr>
                @if ($bhi_invoice->produk != 'REKSADANA' AND $bhi_invoice->produk != 'LETTER')
                <tr>
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION' OR $bhi_invoice->produk == 'BILLING')
                        <td rowspan="6" valign="top" style="text-align: center;">3.</td>
                    @else
                        <td rowspan="7" valign="top" style="text-align: center;">3.</td>
                    @endif
                    {{-- <td rowspan="6" valign="top" style="text-align: center;">3.</td> --}}
                    <td style="padding-left: 6px">
                        Payment of Material Inserting Hongkong Bank's Statement
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td class="tebal" style="padding-left: 6px">
                        * Periode : {{ $bhi_invoice->periode }} 2019
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                <tr>
                    <td class="tebal" style="height: 10px; padding-left: 6px;">
                        {{ ucwords(strtolower($bhi_invoice->produk)) }}
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @else
                <tr>
                    <td class="tebal" style="height: 10px; padding-left: 6px;">
                        Card Center
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @endif
                @if ($bhi_invoice->produk == 'BILLING')
                    @for ($i = 0; $i < 1; $i++)
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->material_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @elseif($bhi_invoice->produk == 'CHEESER')
                    @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->material_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @else
                    @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    <tr>
                        <td style="height: 10px;">- Statement</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->material_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->material_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @endif
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    {{-- <td style="height: 10px;"></td> --}}
                </tr>
                <tr>
                    @if ($bhi_invoice->produk == 'ADVICE' OR $bhi_invoice->produk == 'COLLECTION')
                        <td rowspan="4" valign="top" style="text-align: center;">4.</td>
                    @else
                        <td rowspan="5" valign="top" style="text-align: center;">4.</td>
                    @endif
                    {{-- <td rowspan="3" valign="top" style="text-align: center;">4.</td> --}}
                    <td style="padding-left: 6px;">
                        Payment of Service inserting Hongkong Bank's Statement - <strong>Cost Production</strong>
                    </td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @if ($bhi_invoice->produk == 'BILLING')
                    @for ($i = 0; $i < 1; $i++)
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->cost_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->cost_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @elseif($bhi_invoice->produk == 'CHEESER')
                    @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    <tr>        
                        <td>- {{ ucwords(strtolower($bhi_invoice->bhi_detail[$i]->sub_produk)) }}</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->cost_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->cost_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @else
                    @for ($i = 0; $i < count($bhi_invoice->bhi_detail); $i++)
                    <tr>
                        <td style="height: 10px;">- Statement</td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->cost_inserting,2) }}
                        </td>
                        <td class="cost tebal" style="height: 10px;">
                            {{ number_format($bhi_invoice->bhi_detail[$i]->qty_insert*$bhi_invoice->bhi_detail[$i]->cost_inserting) }}
                        </td>
                    </tr>
                    @endfor
                @endif
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;">
                    <td style="height: 10px;">
                    <td style="height: 10px;"></td>
                    {{-- <td style="height: 10px;"></td> --}}
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    {{-- <td style="height: 10px;"></td> --}}
                </tr>
                @else
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                </tr>
                @endif
                <tr>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    <td style="height: 10px;"></td>
                    @if ($bhi_invoice->produk != 'BILLING')
                    <td style="height: 10px;"></td>
                    @endif
                </tr>
                <tr>
                    <td colspan="3" style="border-top:1px solid black"></td>
                    <td style="border-top:1px solid black" class="tebal">T O T A L</td>
                    <td style="border-top:1px solid black;" class="cost tebal">
                        {{ number_format($bhi_invoice->total) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="tebal">PPN 10%</td>
                    <td class="cost tebal">
                        {{ number_format($bhi_invoice->ppn) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="tebal">PPH 23</td>
                    <td class="cost tebal">
                        ({{ number_format($bhi_invoice->pph) }})
                    </td>
                </tr>
                <tr>
                    <td class="cost amount tebal" colspan="4"><strong style="font-size: 12px">TOTAL AMOUNT DUE (Rp)</strong></td>
                    <td class="cost amount tebal">
                        <strong style="font-size: 12px">{{ number_format($bhi_invoice->amount) }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div><br>
    <div id="footer">
        <table width=100%>
            <tr>
                <td class="tebal" width="20px">Note</td>
                <td class="tebal" width="10px">:</td>
                <td colspan="6" width="10px"></td>
                <td class="tebal">PT. Startek Data Sistim</td>
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">Please transfer to</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td><strong>BRI - KCK</strong></td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jl. Jend. Sudirman Kav 44-46</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jakarta</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td><strong>A/N. PT. STARTEK DATA SISTIM</strong></td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td colspan="6"><strong>A/C. No.: 0206.01.000571.30.8 (IDR)</strong></td>
                <td class="tebal">Hendro Tjokro</td>
            </tr>
        </table>
    </div>
</body>

</html>
