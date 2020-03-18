@extends('layouts.admin')

@section('title', "Startek - Invoice ")

@push('addon-style')
<meta name="csrf-token" content="{{ csrf_token() }}" >
<!-- DATATABLE -->
<link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">
<link href="{{ url('backend/editable/bootstrap-editable.css')}}" rel="stylesheet">
@endpush

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Invoice Reksadana</h1>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Invoice</th>
              <th>Fund Name</th>
              <th>Periode</th>
              <th>Total</th>
              <th>PPN 10%</th>
              <th>PPH 23</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rdct_invoices as $rdct_invoice)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <a href="#" class="invoice" data-type="text" data-pk="{{$rdct_invoice->id}}" data-url="/invoices/{{$rdct_invoice->id}}" data-title="Masukkan Nomor Invoice">{{ $rdct_invoice->no_invoice }}</a>
              </td>
              <td>{{ $rdct_invoice->rdct_fundname->fund_name }}</td>
              <td>{{ $rdct_invoice->periode }}</td>
              <td>{{ number_format($rdct_invoice->total) }}</td>
              <td>{{ number_format($rdct_invoice->ppn) }}</td>
              <td>{{ number_format($rdct_invoice->pph) }}</td>
              <td>{{ number_format($rdct_invoice->amount) }}</td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-success" target="_blank" href="/invoices/{{ $rdct_invoice->id }}/print">Cetak</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop

@push('addon-script')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('backend/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('backend/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/datatables/datatables-demo.js') }}"></script>
<script src="{{ url('backend/editable/bootstrap-editable.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.invoice').editable({
        container: 'body',
      });
    });

</script>
{{-- TOASTR --}}
<script src="{{ url('js/toastr.min.js')}}"></script>
<script>
  @if (session('sukses'))
    toastr.success("{{ Session::get('sukses') }}")
  @endif
  @if (session('failed'))
    toastr.error("{{ Session::get('failed') }}")
  @endif
  @if (session('hapus'))
    toastr.success("{{ Session::get('hapus') }}")
  @endif
</script>
@endpush