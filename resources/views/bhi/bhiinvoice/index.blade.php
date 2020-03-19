@extends('layouts.admin')

@section('title', "Startek - Invoice")

@push('addon-style')
    <link rel="stylesheet" href="{{ url('backend/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('css/toastr.min.css')}}">
@endpush

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Table Invoice Bank HSBC Indonesia</h1>
      <a href="{{ url('/bhi_invoices/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                  <th>Produk</th>
                  <th>Periode</th>
                  <th>Total</th>
                  <th>PPN 10%</th>
                  <th>PPH 23</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bhi_invoices as $invoice)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>
                    <a href="#" class="invoice" data-type="text" data-pk="{{$invoice->id}}" data-url="/bhi_invoices/{{$invoice->id}}" data-title="Masukkan Nomor Invoice">{{ $invoice->no_invoice }}</a>
                  </td>
                  <td>{{ $invoice->produk }}</td>
                  <td>{{ $invoice->periode }}</td>
                  <td>Rp. {{ number_format($invoice->total) }}</td>
                  <td>Rp. {{ number_format($invoice->ppn) }}</td>
                  <td>Rp. {{ number_format($invoice->pph) }}</td>
                  <td>Rp. {{ number_format($invoice->amount) }}</td>
                  <td>
                    <a class="btn btn-xs btn-success" target="_blank" href="/bhi_invoices/{{ $invoice->id }}/print">Cetak</a>
                    <form action="/bhi_invoices/{{ $invoice->id }}" method="post" style="display: inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-xs btn-danger">Delete</button>
                    </form>
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