@extends('layouts.admin')

@section('title', "Startek - Waki Invoice")

@push('addon-style')
<meta name="csrf-token" content="{{ csrf_token() }}" >
<!-- DATATABLE -->
<link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">
<link href="{{ url('backend/editable/bootstrap-editable.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('css/toastr.min.css')}}">
@endpush

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Invoice Label Waki</h1>
      <a href="{{ url('/waki_invoices/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Data
      </a>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>No. Invoice</th>
              <th>Bank</th>
              <th>Nama File</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>PPN 10%</th>
              <th>Amount</th>
              <th>Tgl Proses</th>
              <th>Tgl HO</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($waki_invoices as $invoice)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <a href="#" class="invoice" data-type="text" data-pk="{{ $invoice->id }}" data-url="/waki_invoices/{{$invoice->id}}" data-title="Masukkan Nomor Invoice">{{ $invoice->no_invoice }}</a>
              </td>
              <td>{{ $invoice->bank }}</td>
              <td>{{ $invoice->nama_file }}</td>
              <td>{{ number_format($invoice->qty_printing) }}</td>
              <td>{{ number_format($invoice->total) }}</td>
              <td>{{ number_format($invoice->ppn) }}</td>
              <td>{{ number_format($invoice->amount) }}</td>
              <td>{{ $invoice->tProses }}</td>
              <td>{{ $invoice->tTerima }}</td>
              <td>
                <a class="btn btn-xs btn-success" target="_blank" href="/waki_invoices/{{ $invoice->id }}/print">Cetak</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- END OVERVIEW -->
  </div>
@stop

@push('addon-script')
<script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  });
</script> 
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