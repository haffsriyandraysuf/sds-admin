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
                <td class="tebal" width="500px">CV. WAKI MANDIRI</td>
                <td style="width: 30px;">No.</td>
                <td style="width: 15px;">:</td>
                <td>{{ $waki_invoice->no_invoice }}</td>
            </tr>
            <tr>
                <td rowspan="4" colspan="2"></td>
                <td>Darmo Park 1 Blok 2-B No.1-2 Pakis, Sawahan</td>
            </tr>
            <tr>
                <td>Surabaya - Jawa Timur</td>
                <td style="width: 15px;">Date</td>
                <td style="width: 15px;">:</td>
                <td>{{ $date }}</td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td class="tebal">Attn</td>
                <td class="tebal">:</td>
                <td class="tebal">Bp. Deddy Susanto</td>
            </tr>
            <tr>
                <td class="tebal">NPWP</td>
                <td class="tebal">:</td>
                <td class="tebal">31.812.734.7-614.000</td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
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
            <tbody>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td rowspan="8" valign="top" style="text-align: center;">1</td>
                    <td>Payment of <strong>Material</strong> printing Label " {{ $waki_invoice->nama_file }} "</td>
                    <td class="qty tebal">{{ number_format($waki_invoice->qty_printing) }}</td>
                    <td class="qty tebal">{{ number_format($waki_invoice->price_material) }}</td>
                    <td class="qty tebal">{{ number_format($waki_invoice->qty_printing * $waki_invoice->price_material) }}</td>
                </tr>
                <tr>
                    <td> Tanggal Proses : {{ $tProses }} </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td>(Tanda Terima tgl {{ $tTerima }})</td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td rowspan="11" valign="top" style="text-align: center;">2</td>
                    <td>Payment of Service printing Label " {{ $waki_invoice->nama_file }} " - <strong>Cost
                            Production</strong></td>
                    <td class="qty tebal">{{ number_format($waki_invoice->qty_printing) }}</td>
                    <td class="qty tebal">{{ number_format($waki_invoice->cost_service) }}</td>
                    <td class="qty tebal">{{ number_format($waki_invoice->qty_printing * $waki_invoice->cost_service) }}</td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                    <td style="height: 10px;">
                        <!--kosong-->
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top:1px solid black"></td>
                    <td style="border-top:1px solid black" class="tebal">T O T A L</td>
                    <td style="border-top:1px solid black" class="cost tebal">{{ number_format($waki_invoice->total) }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td class="tebal">PPN 10%</td>
                    <td class="cost"> {{ number_format($waki_invoice->ppn) }} </td>
                </tr>
                <tr>
                    <td class="cost amount" colspan="4"> <strong>TOTAL AMOUNT DUE (Rp)</strong></td>
                    <td class="cost amount"><strong>{{ number_format($waki_invoice->amount) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div><br>
    <div id="footer">
        @if ( $waki_invoice->bank == 'Citibank' )
        <table width=100%>
            <tr>
                <td class="tebal" width="20px">Note</td>
                <td class="tebal" width="10px">:</td>
                <td colspan="6" width="10px"></td>
                <td class="tebal">PT. Startek Data Sistim</td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">Please transfer to</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">CITIBANK</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jl. Jend. Sudirman Kav.54-55</td>
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
                <td colspan="6">A/C. No. : 3000174157 (Rp)</td>
                <td class="tebal">Hendro Tjokro</td>
            </tr>
        </table>
        @elseif ( $waki_invoice->bank == 'Danamon' )
        <table width=100%>
            <tr>
                <td class="tebal" width="20px">Note</td>
                <td class="tebal" width="10px">:</td>
                <td colspan="6" width="10px"></td>
                <td class="tebal">PT. Startek Data Sistim</td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">Please transfer to</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">Bank Danamon Kantor Cab. Cideng</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jl. Cideng Timur No.70D Tanah Abang II</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jakarta Pusat</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>A/N. PT. STARTEK DATA SISTIM</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td colspan="6">A/C. No. : 4243846 (IDR)</td>
                <td class="tebal">Hendro Tjokro</td>
            </tr>
        </table>
        @elseif ( $waki_invoice->bank == 'HSBC' )
        <table width=100%>
            <tr>
                <td class="tebal" width="20px">Note</td>
                <td class="tebal" width="10px">:</td>
                <td colspan="6" width="10px"></td>
                <td class="tebal">PT. Startek Data Sistim</td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
                <td style="height: 10px;">
                    <!--kosong-->
                </td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">Please transfer to</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td class="tebal">BRI - KCK</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jl.Jendral Sudirman Kav. 44 - 46</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>Jakarta</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td>A/N. PT. STARTEK DATA SISTIM</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td width="10px"></td>
                <td colspan="6">A/C. No. : 0206.01.000571.30.8 (IDR)</td>
                <td class="tebal">Hendro Tjokro</td>
            </tr>
        </table>
        @else
        <table width=100%>
            <h3>NULL</h3>
        </table>
        @endif
    </div>
</body>

</html>