@extends('layouts.admin')

@section('title', "Create Invoice")

@push('addon-style')
    <meta name="csrf-token" content="{{ csrf_token() }}" >
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Invoice</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- form start -->
                <form role="form" action="{{ url('/bhi_invoices') }}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="produk">Produk</label>
                                <select class="form-control select2" style="width: 100%;" id="produk" name="produk">
                                    <option value="">--- Pilih Produk ---</option>
                                    @foreach($bhi_price as $price => $list)
                                        <option value="{{ $price }}">{{ $price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="periode">Periode Invoice</label>
                                <select class="form-control select2" style="width: 100%;" id="periode" name="periode">
                                    <option value="">--- Pilih Periode ---</option>
                                    @for ($i = 0; $i < $jumlah; $i += 1) {
                                    <option value="{{ $bulan[$i] }}"> {{ $bulan[$i] }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div id="tampilHarga">
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="total">Total</label>
                                <input type="text" readonly class="form-control" id="total" name="total">
                                <input type="hidden" class="form-control" id="htotal" name="htotal">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="ppn">PPN 10%</label>
                                <input type="text" readonly class="form-control" id="ppn" name="ppn">
                                <input type="hidden" class="form-control" id="hppn" name="hppn">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="pph">PPH 23</label>
                                <input type="text" readonly class="form-control" id="pph" name="pph">
                                <input type="hidden" class="form-control" id="hpph" name="hpph">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="amount">Amount</label>
                                <input type="text" readonly class="form-control" id="amount" name="amount">
                                <input type="hidden" class="form-control" id="hamount" name="hamount">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="add_id" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END OVERVIEW -->
    </div>
@stop

@push('addon-script')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#produk').change(function () {
                const produk = $(this).val();
                $.ajax({
                    method: "GET",
                    url: 'getproduk/' + produk,
                    daya: {
                        id: produk,
                    },
                    success: function (data) {
                        $('#tampilHarga').html(data);
                    }
                })
            });
            $('#tampilHarga').show({
                duration: 1000, // milliseconds
                easing: "swing",
            });
        });

        function hitung(x) {
            let price0, price1, total, ppn, pph, pph23, amount;

            for (let i = 0; i < 2; i++) {
                let price_printing = parseFloat($("#price_printing" + [0]).val());
                let price_inserting = parseFloat($("#price_inserting" + [0]).val());
                let cost_printing = parseFloat($("#cost_printing" + [0]).val());
                let cost_inserting = parseFloat($("#cost_inserting" + [0]).val());
                let qty_printing = parseFloat($("#qty_printing" + [0]).val() || 0);
                let qty_inserting = parseFloat($("#qty_inserting" + [0]).val() || 0);
                let price_printing1 = parseFloat($("#price_printing" + [1]).val());
                let price_inserting1 = parseFloat($("#price_inserting" + [1]).val());
                let cost_printing1 = parseFloat($("#cost_printing" + [1]).val());
                let cost_inserting1 = parseFloat($("#cost_inserting" + [1]).val());
                let qty_printing1 = parseFloat($("#qty_printing" + [1]).val() || 0);
                let qty_inserting1 = parseFloat($("#qty_inserting" + [1]).val() || 0);
                let qty_kertas = parseFloat($("#qty_kertas").val() || 0);
                let qty_amplop = parseFloat($("#qty_amplop").val() || 0);
                let biaya_kertas = parseFloat($("#biaya_kertas").val());
                let biaya_amplop = parseFloat($("#biaya_amplop").val());
                if ($("#produk").val() === "CHEESER") {
                    price0 = qty_printing * price_printing + qty_inserting * price_inserting + qty_printing * cost_printing + qty_inserting * cost_inserting;
                    price1 = qty_printing1 * price_printing1 + qty_inserting1 * price_inserting1 + qty_printing1 * cost_printing1 + qty_inserting1 * cost_inserting1;
                    total = price0 + price1;
                    ppn = Math.floor(total * 0.1);
                    pph = qty_printing * cost_printing + qty_inserting * cost_inserting + qty_printing1 * cost_printing1 + qty_inserting1 * cost_inserting1;
                    pph23 = pph * 0.02;
                    amount = total + ppn - pph23;
                } else if ($("#produk").val() === "BILLING") {
                    price0 = qty_printing * price_printing + qty_inserting * price_inserting + qty_printing * cost_printing + qty_inserting * cost_inserting;
                    price1 = qty_printing1 * price_printing1 + qty_printing1 * cost_printing1;
                    total = price0 + price1;
                    ppn = Math.floor(total * 0.1);
                    pph = qty_printing * cost_printing + qty_inserting * cost_inserting + qty_printing1 * cost_printing1;
                    pph23 = pph * 0.02;
                    amount = total + ppn - pph23;
                } else if ($("#produk").val() === "REKSADANA") {
                    price0 = qty_printing * price_printing + qty_inserting * price_inserting + qty_printing * cost_printing + qty_inserting * cost_inserting + qty_kertas * biaya_kertas + qty_amplop * biaya_amplop;
                    total = price0;
                    ppn = Math.floor(total * 0.1);
                    pph = qty_printing * cost_printing + qty_inserting * cost_inserting;
                    pph23 = pph * 0.02;
                    amount = total + ppn - pph23;
                } else {
                    price0 = qty_printing * price_printing + qty_inserting * price_inserting + qty_printing * cost_printing + qty_inserting * cost_inserting;
                    total = price0;
                    ppn = Math.floor(total * 0.1);
                    pph = qty_printing * cost_printing + qty_inserting * cost_inserting;
                    pph23 = pph * 0.02;
                    amount = total + ppn - pph23;
                }
                $("#htotal").val(total);
                $("#hppn").val(ppn);
                total = total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $("#total").val(total);
                ppn = ppn.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $("#ppn").val(ppn);
                pph23 = Math.floor(pph23, 2);
                $("#hpph").val(pph23);
                $("#pph").val(pph23.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                amount = Math.ceil(amount);
                $("#hamount").val(amount);
                $("#amount").val(amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            }
        }
    </script>
@endpush
