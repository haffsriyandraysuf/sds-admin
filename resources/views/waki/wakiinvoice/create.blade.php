@extends('layouts.admin')

@section('title', "Startek -Create Invoice")

@push('addon-style')
  <!-- Datepicker -->
  <link rel="stylesheet" href="{{ asset('backend/datepicker/css/bootstrap-datepicker.min.css') }}">
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
        <form role="form" action="{{ url('/waki_invoices') }}" method="post">
          @csrf
          <div class="box-body">
            <div class="row">
              <div class="form-group col-sm-4">
                <label for="no_invoice">No. Invoice</label>
                <input type="text" class="form-control" id="no_invoice" name="no_invoice">
              </div>
              <div class="form-group col-sm-4">
                <label for="nama_file">Nama File</label>
                <input type="text" class="form-control" id="nama_file" name="nama_file">
              </div>
              <div class="form-group col-sm-4">
                <label for="bank">Project Bank</label>
                <select class="form-control select2" style="width: 100%;" id="bank" name="bank">
                  @foreach ($bank as $kode => $nama) : ?>
                  <option value="{{ $kode }}">{{ $nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="qty_printing">Quantity</label>
                <input type="text" required class="form-control" id="qty_printing" name="qty_printing" onkeyup="hitungInv()">
                <input type="hidden" class="form-control" id="hqty" name="qty">
              </div>
              <div class="form-group col-sm-2">
                <label for="price_material">Price Material</label>
                <input type="text" readonly class="form-control" id="price_material" name="price_material" value="{{ $waki_prices->price_material }}">
              </div>
              <div class="form-group col-sm-2">
                <label for="cost_service">Cost Service</label>
                <input type="text" readonly class="form-control" id="cost_service" name="cost_service" value="{{ $waki_prices->cost_service }}">
              </div>
              <div class="form-group col-sm-2">
                <label for="total">Total</label>
                <input type="text" readonly class="form-control ttl-kosong" id="total" name="total">
                <input type="hidden" class="form-control ttl-kosong" id="htotal" name="htotal">
              </div>
              <div class="form-group col-sm-2">
                <label for="ppn">PPN 10%</label>
                <input type="text" readonly class="form-control ttl-kosong" id="ppn" name="ppn">
                <input type="hidden" class="form-control ttl-kosong" id="hppn" name="hppn">
              </div>
              <div class="form-group col-sm-2">
                <label for="amount">Amount</label>
                <input type="text" readonly class="form-control ttl-kosong" id="amount" name="amount">
                <input type="hidden" class="form-control ttl-kosong" id="hamount" name="hamount">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-6">
                <label>Tanggal Proses</label>
                <div class="input-group date">
                  {{-- <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div> --}}
                  <input type="text" class="form-control pull-right" id="datepicker1" name="tProses">
                </div>
              </div>
              <div class="form-group col-sm-6">
                <label>Tanggal Handsover</label>
                <div class="input-group date">
                  {{-- <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div> --}}
                  <input type="text" class="form-control pull-right" id="datepicker2" name="tTerima">
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            {{-- <a class="btn btn-default" onclick="hitungInv()" id="hitung" name="hitung">Hitung</a> --}}
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- END OVERVIEW -->
  </div>
@stop

@push('addon-script')
  <!-- Datepicker -->
  <script src="{{ asset('backend/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('#datepicker1').datepicker({
        autoclose: true
      });
      $('#datepicker2').datepicker({
        autoclose: true
      });
    });
    function hitungInv() {
      var ttl_qty = parseInt($("#qty_printing").val() || 0);
      var price_material = parseInt($("#price_material").val());
      var cost_service = parseInt($("#cost_service").val());
      var htotal = ttl_qty * price_material + ttl_qty * cost_service;
      var total = htotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
      $('#hqty').val(ttl_qty);
      if(ttl_qty == 0){
        $(".ttl-kosong").val(0);
      }else{
        $("#total").val(total);
        $("#htotal").val(htotal);
        var hppn = htotal * 0.1;
        var ppn = hppn.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#ppn").val(ppn)
        $("#hppn").val(hppn);
        var hamount = htotal + hppn;
        var amount = hamount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#amount").val(amount);
        $("#hamount").val(hamount);
      }
    };
  </script>
@endpush