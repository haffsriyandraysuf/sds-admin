@extends('layouts.admin')

@section('title', "Startek - Create Invoice")

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
        <form role="form" action="{{ url('/invoices') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="rdct_fundname_id">Fund Name Code</label>
                <input type="text" readonly class="form-control" id="rdct_fundname_id" name="rdct_fundname_id" value="{{ $rdct_fundname->id }}">
              </div>
              <div class="form-group col-sm-6">
                <label for="fund_name">Fund Name</label>
                <input type="text" readonly class="form-control" id="fund_name" name="fund_name" value="{{ $rdct_fundname->fund_name }}">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label for="no_invoice">No. Invoice</label>
                <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="No. Invoice">
              </div>
              <div class="form-group col-sm-6">
                <label for="periode">Periode Invoice</label>
                <select class="form-control select2" style="width: 100%;" id="periode" name="periode">
                  @for ($i = 0; $i < $jumlah; $i += 1) {
                    <option value="{{ $bulan[$i] }}"> {{ $bulan[$i] }}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="row" id="qty">
              <div class="form-group col-sm-4">
                <label for="qty_printing">Quantity Printing</label>
                <input type="text" required class="form-control" id="qty_printing" name="qty_printing">
              </div>
              <div class="form-group col-sm-4">
                <label for="qty_inserting">Quantity Inserting</label>
                <input type="text" required class="form-control" id="qty_inserting" name="qty_inserting">
              </div>
              <div class="form-group col-sm-4">
                <label for="ttl_qty">Total Quantity</label>
                <input type="text" readonly class="form-control" id="ttl_qty" name="ttl_qty" onchange="hitung()">
              </div>
            </div>
            <div class="row" id="price">
              <div class="form-group col-sm-3">
                <label for="price_printing">Material Printing</label>
                <input type="text" readonly class="form-control" id="price_printing" name="price_printing" value="{{ $rdct_prices->material_printing }}">
              </div>
              <div class="form-group col-sm-3">
                <label for="price_inserting">Material Inserting</label>
                <input type="text" readonly class="form-control" id="price_inserting" name="price_inserting" value="{{ $rdct_prices->material_inserting }}">
              </div>
              <div class="form-group col-sm-3">
                <label for="cost_printing">Cost Printing</label>
                <input type="text" readonly class="form-control" id="cost_printing" name="cost_printing" value="{{ $rdct_prices->cost_printing }}">
              </div>
              <div class="form-group col-sm-3">
                <label for="cost_inserting">Cost Inserting</label>
                <input type="text" readonly class="form-control" id="cost_inserting" name="cost_inserting" value="{{ $rdct_prices->cost_inserting }}">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                <label for="total">Total</label>
                <input type="text" readonly class="form-control ttl_kosong" id="total" name="total">
                <input type="hidden" class="form-control" id="htotal" name="htotal">
              </div>
              <div class="form-group col-sm-3">
                <label for="ppn">PPN 10%</label>
                <input type="text" readonly class="form-control ttl_kosong" id="ppn" name="ppn">
                <input type="hidden" class="form-control" id="hppn" name="hppn">
              </div>
              <div class="form-group col-sm-3">
                <label for="pph">PPH 23</label>
                <input type="text" readonly class="form-control ttl_kosong" id="pph" name="pph">
                <input type="hidden" class="form-control" id="hpph" name="hpph">
              </div>
              <div class="form-group col-sm-3">
                <label for="amount">Amount</label>
                <input type="text" readonly class="form-control ttl_kosong" id="amount" name="amount">
                <input type="hidden" class="form-control" id="hamount" name="hamount">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            {{-- <a class="btn btn-default" onclick="hitung()" id="hitung" name="hitung">Hitung</a> --}}
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
    $('#qty').keyup(function () {
      var qty_printing = parseInt($('#qty_printing').val() || 0);
      var qty_inserting = parseInt($('#qty_inserting').val() || 0);
      var ttl_qty = qty_printing + qty_inserting;
      $('#ttl_qty').val(ttl_qty);
      var price_printing = parseInt($("#price_printing").val());
      var price_inserting = parseInt($("#price_inserting").val());
      var cost_printing = parseInt($("#cost_printing").val());
      var cost_inserting = parseInt($("#cost_inserting").val());
      var ttl_qty = parseInt($("#ttl_qty").val());
      var total = ttl_qty * price_printing + ttl_qty * price_inserting + ttl_qty * cost_printing +
        ttl_qty * cost_inserting;
      if (ttl_qty == 0) {
        $('.ttl_kosong').val(0);
        // swal({
        //   type: 'warning',
        //   title: 'Gagal!',
        //   text: 'Data gagal ditambahkan!',
        //   confirmButtonText: "OK"
        // });
      } else if (total < 100000) {
        var total1 = 100000;
        var ppn = Math.floor(total1 * 0.1);
        var pph23 = ppn * 0.02;
        var amount = total1 + ppn - pph23;
        $("#htotal").val(total1);
        $("#hppn").val(ppn);
        var total1 = total1.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#total").val(total1);
        var ppn = ppn.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#ppn").val(ppn);
        var pph23 = Math.floor(pph23, 2);
        $("#hpph").val(pph23);
        $("#pph").val(pph23.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        var amount = Math.ceil(amount);
        $("#hamount").val(amount);
        $("#amount").val(amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        // $("#price").fadeOut("slow"); // A millisecond duration value is also acceptable
        $("#price").hide({ // See all possible options in: api.jquery.com/toggle/#toggle-options
          duration: 1000, // milliseconds
          easing: "swing",
        });
        $("#price1").hide({ // See all possible options in: api.jquery.com/toggle/#toggle-options
          duration: 1000, // milliseconds
          easing: "swing",
        });
      } else {
        var total = ttl_qty * price_printing + ttl_qty * price_inserting + ttl_qty * cost_printing +
          ttl_qty * cost_inserting;
        var ppn = Math.floor(total * 0.1);
        var pph = ttl_qty * cost_printing + ttl_qty * cost_inserting;
        var pph23 = pph * 0.02;
        var amount = total + ppn - pph23;
        $("#htotal").val(total);
        $("#hppn").val(ppn);
        var total = total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#total").val(total);
        var ppn = ppn.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#ppn").val(ppn);
        var pph23 = Math.floor(pph23, 2);
        $("#hpph").val(pph23);
        $("#pph").val(pph23.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        var amount = Math.ceil(amount);
        $("#hamount").val(amount);
        $("#amount").val(amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        // $("#price").fadeIn("slow"); // A millisecond duration value is also acceptable
        $("#price").show({ // See all possible options in: api.jquery.com/toggle/#toggle-options
          duration: 1000, // milliseconds
          easing: "swing",
        });
        $("#price1").show({ // See all possible options in: api.jquery.com/toggle/#toggle-options
          duration: 1000, // milliseconds
          easing: "swing",
        });
      }
    });
  });
</script>
@endpush